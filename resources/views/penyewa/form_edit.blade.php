@extends('page.index')
@section('konten')
    <h3 class="mt-3">Form Edit Donatur</h3>
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
        <form method="POST" action="{{ route('penyewa.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Yayasan :</label>
                <input type="text" name="team" placeholder="isi nama team"  value="{{ $rs->team }}" class="form-control @error('team') is-invalid @enderror" maxlength="45"/>
                @error('team')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama Donatur :</label>
                <input type="text" name="nama" placeholder="isi nama anda"  value="{{ $rs->nama }}" class="form-control @error('nama') is-invalid @enderror" maxlength="45"/>
                @error('model')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Umur Yayasan :</label>
                <input type="number" name="umur" value="{{ $rs->umur }}" class="form-control @error('umur') is-invalid @enderror" min="16" max="45"/>
                @error('umur')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nomor HP :</label>
                <input type="text" name="hp" placeholder="isi nomor hp anda" value="{{ $rs->hp }}" class="form-control @error('hp') is-invalid @enderror" maxlength="15"/>
                @error('hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat :</label>
                <input type="text" name="alamat" placeholder="isi alamat anda" value="{{ $rs->alamat }}" class="form-control @error('alamat') is-invalid @enderror" maxlength="15"/>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto Yayasan :</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control @error('foto') is-invalid @enderror">
                    </div>
                </div>
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/penyewa') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection
