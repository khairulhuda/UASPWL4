@extends('page.index')
@section('konten')
@php
    $ar_judul = ['No','Nama Yayasan','Nama Donatur','Umur','Nomor HP','Alamat','Foto','Action'];
    $no = 1;
@endphp
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 25px;">Data Donatur</h3>
                    <a class="btn btn-primary" style="float: right;" href="{{ route('penyewa.create') }}" role="button" title="klik untuk tambah data"><i class="fas fa-plus-circle"></i> Tambah</a>
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
                            @foreach ($ar_penyewa as $m)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $m->team }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->umur }}</td>
                                    <td>{{ $m->hp }}</td>
                                    <td>{{ $m->alamat }}</td>
                                    <td width="13%">
                                        @php
                                        if(!empty($m->foto)) {
                                        @endphp
                                            <img src="{{ asset('images/penyewa')}}/{{ $m->foto }}" width="50%" />
                                        @php
                                        } else {
                                        @endphp
                                            <img src="{{ asset('images')}}/no_picture.png" width="50%" />
                                        @php
                                        }
                                        @endphp
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('penyewa.destroy',$m->id) }}">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-info" href="{{ route('penyewa.show',$m->id) }}" title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i></a>
                                            <a class="btn btn-warning" href="{{ route('penyewa.edit',$m->id) }}" title="klik untuk mengedit data"><i class="fas fa-edit"></i></a>
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