@extends('page.index')
@section('konten')
@php
    $rs1 = App\Models\Pemilik::all();
    $rs2 = App\Models\Penyewa::all();
    $rs3 = App\Models\Jenislapangan::all();
@endphp
    <h3>Form Edit Donasi</h3>
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
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('lapangan.update',$rs->id) }}">
            @csrf
            @method('put')
        <div class="form-group">
            <label>Nama Donasi :</label>
            <input type="text" name="nama" placeholder="masukan nama donasi" value="{{ $rs->nama }}" class="form-control @error('nama') is-invalid @enderror"/>
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
                @php
                    $sel1 = ($p->id == $rs->idpemilik) ? 'selected' : '';
                @endphp
                    <option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
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
                @php
                    $sel2 = ($m->id == $rs->idpenyewa) ? 'selected' : '';
                @endphp
                    <option value="{{ $m->id }}" {{ $sel1 }}>{{ $m->team }}</option>
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
                
                @php
                    $cek = ($r->id == $rs->idjenis_lapangan) ? 'checked' : '';
                @endphp
                    <input type="radio" name="idjenis_lapangan" 
                    value="{{ $r->id }}" {{ $cek }} /> {{ $r->nama }} &nbsp;
                @endforeach
            </div>

            <div class="form-group">
                <label>Tanggal :</label>
                <input type="date" name="tanggal" value="{{ $rs->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror"/>
                @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
        <div class="form-group">
                <label>Alamat :</label>
                <input type="text" name="alamat" placeholder="masukan alamat anda" value="{{ $rs->alamat }}" class="form-control @error('alamat') is-invalid @enderror"/>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto Pemberi Donasi :</label>
                <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control @error('foto') is-invalid @enderror"/>
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/lapangan') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection