@php
    $ar_judul = ['No','Nama Penerima Donasi','Umur','Nomor HP','alamat'];
    $no = 1;
@endphp
    <h3 align="center">Data Penerima Donasi</h3>
    <table align="center" border="1" cellpadding="5">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th align="center">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($ar_pemilik as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->umur }}</td>
                    <td>{{ $p->hp }}</td>
                    <td>{{ $p->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>