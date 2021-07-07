@extends('page.index')
@section('konten')
    <h3 class="mt-3">Detail Data Donatur</h3>
    @foreach ($ar_penyewa as $m)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($m->foto)) {
            @endphp
                <img src="{{ asset('images/penyewa')}}/{{ $m->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title" style="font-size: 24px; font-weight: 600;">{{ $m->team }}</h5>
                <p class="card-text">
                    Nama : {{ $m->nama }}
                    <br/>Umur : {{ $m->umur }}
                    <br/>Hp : {{ $m->hp }}
                    <br/>alamat : {{ $m->alamat }}
                </p>
                <a href="{{ url('/penyewa') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection