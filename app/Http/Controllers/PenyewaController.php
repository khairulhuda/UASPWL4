<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Penyewa;
use Symfony\Contracts\Service\Attribute\Required;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_penyewa = DB::table('penyewa')->get();

        return view('penyewa.index', compact('ar_penyewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('penyewa.form');
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
                'team' => 'required',
                'nama' => 'required',
                'umur' => 'required',
                'hp' => 'required|numeric',
                'alamat' => 'required',
                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:2000',
            ],

            [
                'team.required' => 'Nama Team Wajib di Isi',
                'nama.required' => 'Nama Wajib di Isi',
                'umur.required' => 'Umur Mu Harus Berupa Angka',
                'hp.required' => 'HP Mu Harus di Isi',
                'hp.numeric' => 'HP Mu wajib diisi angka ',
                'alamat.required' => 'Alamat Harus di Isi',
                'foto.image' => 'File ini Harus Format jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 2mb ya guys',
            ]
        );

        //proses upload file
        if (!empty($request->foto)) {
            $fileName = $request->team . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/penyewa'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('penyewa')->insert(
            [
                'team' => $request->team,
                'nama' => $request->nama,
                'umur' => $request->umur,
                'hp' => $request->hp,
                'alamat' => $request->alamat,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/penyewa');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail
        $ar_penyewa = DB::table('penyewa')->where('penyewa.id', $id)->get();

        return view('penyewa.show', compact('ar_penyewa'));

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
        $data = DB::table('penyewa')->where('id', $id)->get();

        return view('penyewa.form_edit', compact('data'));
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
        DB::table('penyewa')->where('id', $id)->update(
            [
                'team' => $request->team,
                'nama' => $request->nama,
                'umur' => $request->umur,
                'hp' => $request->hp,
                'alamat' => $request->alamat,
                'foto' => $request->foto,            ]
        );

        //2. landing page
        return redirect('/penyewa' . '/' . $id);
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
        DB::table('penyewa')->where('id', $id)->delete();

        //2. landing page
        return redirect('/penyewa');
    }

    public function PDF()
    {
        $ar_penyewa = DB::table('penyewa')->get();

        $pdf = PDF::loadView('penyewa.PDFku', ['ar_penyewa' => $ar_penyewa]);

        return $pdf->download('DataDonatur.pdf');
    }
}