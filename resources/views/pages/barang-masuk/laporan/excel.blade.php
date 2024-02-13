<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang Masuk</title>
</head>

<body>

    <h4>PT. CONTOH SAJA</h4>
    <p>Jl. Lembah Bening No 111</p>
    <p>Pluta City - Jupiter</p>
    <p>Phone Number : 01212234234</p>

    <p></p>
    <p>Laporan Barang Masuk</p>
    <p>Periode :
        {{ \Carbon\Carbon::parse(request()->from_date)->format('d M Y') }}
        s/d
        {{ \Carbon\Carbon::parse(request()->to_date)->format('d M Y') }}
    </p>
    <p>Total : {{ $barangMasukDetails->count() }}</p>
    {{-- <p></p> --}}

    <table>
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black">No</th>
                <th style="text-align:center; border: 1px solid black">No. Transaksi</th>
                <th style="text-align:center; border: 1px solid black">Tanggal Transaksi</th>
                <th style="text-align:center; border: 1px solid black">Pemasok</th>
                <th style="text-align:center; border: 1px solid black">Kode Barang</th>
                <th style="text-align:center; border: 1px solid black">Nama Barang</th>
                <th style="text-align:center; border: 1px solid black">Satuan</th>
                <th style="text-align:center; border: 1px solid black">Harga</th>
                <th style="text-align:center; border: 1px solid black">Jumlah</th>
                <th style="text-align:center; border: 1px solid black">Total Harga</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($barangMasukDetails as $row)
                <tr>
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->barangMasuk->no_transaksi }}</td>
                    <td style="text-align:center; border: 1px solid black">
                        {{ \Carbon\Carbon::parse($row->barangMasuk->tgl_masuk)->format('d M Y') }}
                    </td>
                    <td style="text-align:left; border: 1px solid black">
                        {{ optional($row->barangMasuk)->pemasok->nama_pemasok }}
                    </td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->barang->kode }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->barang->nama_barang }}</td>
                    <td style="text-align:center; border: 1px solid black">{{ $row->barang->satuan->nama_satuan }}</td>
                    <td style="text-align:right; border: 1px solid black">{{ number_format($row->harga) }}
                    <td style="text-align:center; border: 1px solid black">{{ $row->qty }}</td>
                    <td style="text-align:right; border: 1px solid black">{{ $row->total_harga }}</td>

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
