@extends('page.index')
@section('konten')
    <h3 class="mt-3">Detail Data Penerima Donasi</h3>
    @foreach ($ar_pemilik as $p)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($p->foto)) {
            @endphp
                <img src="{{ asset('images/pemilik')}}/{{ $p->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title" style="font-size: 24px; font-weight: 600;">{{ $p->nama }}</h5>
                <p class="card-text">
                    <br/>Umur : {{ $p->umur }}
                    <br/>Nomor HP : {{ $p->hp }}
                    <br/>Alamat : {{ $p->alamat }}
                </p>
                <a href="{{ url('/pemilik') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection