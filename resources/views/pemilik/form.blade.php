@extends('page.index')
@section('konten')
    <h3 class="mt-3">Form Penerima Donasi</h3>
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
    <form method="POST" action="{{ route('pemilik.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Penerima Donasi :</label>
            <input type="text" name="nama" placeholder="isi nama anda" class="form-control @error('nama') is-invalid @enderror" maxlength="45"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Umur :</label>
            <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror" min="16" max="45" />
            @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nomor HP :</label>
            <input type="text" name="hp" placeholder="isi nomor hp anda" class="form-control @error('hp') is-invalid @enderror" maxlength="15"/>
            @error('hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" placeholder="isi alamat" class="form-control @error('alamat') is-invalid @enderror" maxlength="15"/>
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Penerima Donasi :</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Masukan file foto</label>
                </div>
            </div>
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