@php
$ar_judul = ['No','Nama Donasi','Nama Penerima Donasi','Nama Donatur','Jenis Donasi','Tanggal','Alamat'];
    $no = 1;
@endphp
    <h3 align="center">Data Donasi</h3>
    <table align="center" border="1" cellpadding="5">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th align="center">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($ar_lapangan as $l)
                <tr>
                <td>{{ $no++ }}</td>
                 <td>{{ $l->nama }}</td>
                 <td>{{ $l->np }}</td>
                <td>{{ $l->team }}</td>
                <td>{{ $l->jl }}</td>
                <td>{{ $l->tanggal }}</td>
                <td>{{ $l->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>