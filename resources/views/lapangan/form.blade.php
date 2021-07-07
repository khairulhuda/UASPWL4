@extends('page.index')
@section('konten')
@php
    $rs1 = App\Models\Pemilik::all();
    $rs2 = App\Models\Penyewa::all();
    $rs3 = App\Models\Jenislapangan::all();
@endphp
    <h3>Form Donasi</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('lapangan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Donasi :</label>
            <input type="text" name="nama" placeholder="masukan nama lapangan" class="form-control @error('nama') is-invalid @enderror"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Penerima Donasi :</label>
            <select class="form-control @error('idpemilik') is-invalid @enderror" name="idpemilik" />
            <option value="">-- Pilih Penerima Donasi --</option>
            @foreach ($rs1 as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
            </select>
            @error('idpemilik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Donatur :</label>
            <select class="form-control @error('idpenyewa') is-invalid @enderror" name="idpenyewa" />
            <option value="">-- Pilih Donatur --</option>
            @foreach ($rs2 as $m)
                <option value="{{ $m->id }}">{{ $m->team }}</option>
            @endforeach
            </select>
            @error('idpenyewa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Jenis Donasi :</label><br/>
            @foreach ($rs3 as $r)
                <input type="radio" class="@error('idjenis_lapangan') is-invalid @enderror" name="idjenis_lapangan" 
                value="{{ $r->id }}"/> {{ $r->nama }} &nbsp;
            @endforeach
            @error('idjenis_lapangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Tanggal :</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"/>
            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" placeholder="masukan alamat anda" class="form-control @error('alamat') is-invalid @enderror"/>
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Donasi :</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"/>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-danger" name="proses">Hapus</button>
    </form>
@endsection