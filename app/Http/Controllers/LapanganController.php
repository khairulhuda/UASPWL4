<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Lapangan;
use Symfony\Contracts\Service\Attribute\Required;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_lapangan = DB::table('lapangan')
        ->join('pemilik','pemilik.id','=','lapangan.idpemilik')
        ->join('penyewa','penyewa.id','=','lapangan.idpenyewa')
        ->join('jenis_lapangan','jenis_lapangan.id','=','lapangan.idjenis_lapangan')
        ->select('lapangan.*','pemilik.nama as np','penyewa.team as team','jenis_lapangan.nama as jl')
        ->get();
        
        return view('lapangan.index',compact('ar_lapangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('lapangan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validated = $request->validate(
            [
                'nama' => 'required',
                'idpemilik' => 'required|numeric',
                'idpenyewa' => 'required|numeric',
                'idjenis_lapangan' => 'required|numeric',
                'tanggal' => 'required',
                'alamat' => 'required',
                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:2000',
            ],

            [
                'nama.required' => 'Nama Harus di Isi',
                'idpemilik.required' => 'Pilih Nama Pemilik',
                'idpenyewa.required' => 'Pilih Nama Penyewa',
                'idjenis_lapangan.required' => 'Pilih Jenis Lapangan',
                'tanggal.required' => 'Tanggal Harus di Isi',
                'alamat.required' => 'Alamat Harus di Isi',
                'foto.image' => 'File Harus Format jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 2mb',
            ]
        );

        //proses upload file
        if (!empty($request->foto)) {
            $fileName = $request->nama. '.' . $request->foto->extension();
            $request->foto->move(public_path('images/lapangan'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('lapangan')->insert(
            [
                'nama' => $request->nama,
                'idpemilik' => $request->idpemilik,
                'idpenyewa' => $request->idpenyewa,
                'idjenis_lapangan' => $request->idjenis_lapangan,
                'tanggal' => $request->tanggal,
                'alamat' => $request->alamat,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/lapangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail
        $ar_lapangan = DB::table('lapangan')
        ->join('pemilik','pemilik.id','=','lapangan.idpemilik')
        ->join('penyewa','penyewa.id','=','lapangan.idpenyewa')
        ->join('jenis_lapangan','jenis_lapangan.id','=','lapangan.idjenis_lapangan')
        ->select('lapangan.*','pemilik.nama as np','penyewa.team as team','jenis_lapangan.nama as jl')
        ->where('lapangan.id', $id)->get();

        return view('lapangan.show', compact('ar_lapangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan ke halaman form edit
        $data = DB::table('lapangan')->where('id', $id)->get();

        return view('lapangan.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengedit data
        // 1. proses ubah data
        DB::table('lapangan')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'idpemilik' => $request->idpemilik,
                'idpenyewa' => $request->idpenyewa,
                'idjenis_lapangan' => $request->idjenis_lapangan,
                'tanggal' => $request->tanggal,
                'alamat' => $request->alamat,
                'foto' => $request->foto,
            ]
        );

        //2. landing page
        return redirect('/lapangan'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        //1. hapus data
        DB::table('lapangan')->where('id', $id)->delete();

        //2. landing page
        return redirect('/lapangan');
    }

    public function PDF()
    {
        $ar_lapangan = DB::table('lapangan')
        ->join('pemilik','pemilik.id','=','lapangan.idpemilik')
        ->join('penyewa','penyewa.id','=','lapangan.idpenyewa')
        ->join('jenis_lapangan','jenis_lapangan.id','=','lapangan.idjenis_lapangan')
        ->select('lapangan.*','pemilik.nama as np','penyewa.team as team','jenis_lapangan.nama as jl')
        ->get();

        $pdf = PDF::loadView('lapangan.PDFku', ['ar_lapangan' => $ar_lapangan]);

        return $pdf->download('DataDonasi.pdf');
    }
}