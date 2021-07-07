@extends('page.index')
@section('konten')
@php
    $ar_judul = ['No','Nama Donasi','Nama Penerima Donasi','Nama Donatur','Jenis Donasi','Tanggal','Alamat', 'Action'];
    $no = 1;
@endphp
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 25px;">Data Donasi</h3>
                    <a class="btn btn-primary" style="float: right;" href="{{ route('lapangan.create') }}" role="button" title="klik untuk tambah data"><i class="fas fa-plus-circle"></i> Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                @foreach ($ar_judul as $jdl)
                                <th style="text-align: center">{{ $jdl }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @foreach ($ar_lapangan as $l)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $l->nama }}</td>
                                    <td>{{ $l->np }}</td>
                                    <td>{{ $l->team }}</td>
                                    <td>{{ $l->jl }}</td>
                                    <td>{{ $l->tanggal }}</td>
                                    <td>{{ $l->alamat }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('lapangan.destroy',$l->id) }}">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-info" href="{{ route('lapangan.show',$l->id) }}" title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i></a>
                                            <a class="btn btn-warning" href="{{ route('lapangan.edit',$l->id) }}" title="klik untuk mengedit data"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection