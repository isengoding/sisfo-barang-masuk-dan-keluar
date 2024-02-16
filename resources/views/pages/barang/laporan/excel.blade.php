<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Stok Barang</title>
</head>

<body>

    <h4>PT. CONTOH SAJA</h4>
    <p>Jl. Lembah Bening No 111</p>
    <p>Pluta City - Jupiter</p>
    <p>Phone Number : 01212234234</p>

    <p></p>
    <p>Laporan Stok Barang</p>
    {{-- <p>Periode :
        {{ \Carbon\Carbon::parse(request()->from_date)->format('d M Y') }}
        s/d
        {{ \Carbon\Carbon::parse(request()->to_date)->format('d M Y') }}
    </p> --}}
    <p>Total : {{ $barangs->count() }}</p>
    {{-- <p></p> --}}

    <table>
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black">No</th>
                <th style="text-align:center; border: 1px solid black">Kode Barang</th>
                <th style="text-align:center; border: 1px solid black">Nama Barang</th>
                <th style="text-align:center; border: 1px solid black">Stok</th>
                <th style="text-align:center; border: 1px solid black">Masuk</th>
                <th style="text-align:center; border: 1px solid black">Keluar</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($barangs as $row)
                <tr>
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->kode }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->nama_barang }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->stok }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->totalBarangMasuk }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->totalBarangKeluar }}</td>

                </tr>
            @empty
                <tr>
                    <td>No Data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
