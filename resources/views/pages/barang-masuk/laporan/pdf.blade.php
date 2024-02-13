<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Barang Masuk</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .page {
            /* max-width: 80em; */
            /* margin: 0 auto;' */
            /* position: absolute; */
            /* top: 170px; */
            position: relative;
            top: 5;
        }

        table th,
        table td {
            text-align: left;
        }

        table.layout {
            width: 100%;
            border-collapse: collapse;
        }

        table.display {
            margin: 1em 0;
        }

        table.display th,
        table.display td {
            border: 1px solid #B3BFAA;
            padding: .5em 1em;
        }

        table.display th {
            background: #D5E0CC;
        }

        table.display td {
            background: #fff;
        }

        table.responsive-table {
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }

        .garis {
            margin-top: 20px;
            height: 3px;
            border-top: 3px solid black;
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>
    <table style="width:100%">
        <tr>
            <td style="text-align: right; width: 100px;">
                @php
                    //encode logo ke base64
                    // $image = public_path('/img/').\Setting::getSetting()->logo;
                    $image = 'https://www.solonohio.org/ImageRepository/Document?documentID=11108';

                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode(file_get_contents($image));
                @endphp
                <img width="100px" height="100px"
                    src="data:image/png;base64, {{ base64_encode(file_get_contents('https://www.solonohio.org/ImageRepository/Document?documentID=11108')) }}"
                    alt="">
            </td>
            <td style="text-align: center; width: 200px;">

                <div style="font-size: 24px">PT. CONTOH SAJA</div>
                <div style="font-size: 24px"></div>
                <div style="font-size: 16px">Jl. Tani Bersaudara No. 9 Johor Medan</div>
                <div style="font-size: 16px">Telp : (061) 7755 - 440 - Hp : 0819 1234 1231</div>
                <div style="font-size: 16px">Email : legalisat@gmail.com</div>
            </td>
            <td style="text-align: right; width: 50px;">

            </td>
        </tr>
    </table>
    <div class="garis"></div>
    <div style="text-align: center">
        <p style="font-size: 18px"><strong><u>Laporan Barang Masuk</u></strong></p>
        <div style="font-size: 14px">Periode :
            {{ \Carbon\Carbon::parse(request()->from_date)->format('d M Y') }}
            s/d
            {{ \Carbon\Carbon::parse(request()->to_date)->format('d M Y') }}
        </div>
    </div>
    <div class="page">

        <table class="layout display responsive-table" style="font-size: 12px">
            <thead>
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center; white-space: nowrap;">Tanggal Transaksi</th>

                    {{-- <th style="text-align: center; white-space: nowrap;">Gambar</th> --}}
                    <th style="text-align: center; white-space: nowrap;">Nama Barang</th>
                    <th style="text-align: center; white-space: nowrap;">Pemasok</th>
                    <th style="text-align: center; white-space: nowrap;">Satuan</th>
                    <th style="text-align: center; white-space: nowrap;">Harga</th>
                    <th style="text-align: center">Jumlah</th>
                    <th style="text-align: center">Total Harga</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($barangMasukDetails as $row)
                    <tr>
                        <td style="text-align: center; vertical-align: top;">{{ $loop->iteration }}</td>
                        {{-- <td style="text-align: center; vertical-align: top;">
                            <img width="32px" height="32px" src="data:image/png;base64,{{ $row->image_base_64 }}"
                                alt="">
                        </td> --}}
                        <td style="text-align: left; vertical-align: top; white-space: nowrap;">
                            {{ \Carbon\Carbon::parse($row->barangMasuk->tgl_masuk)->format('d M Y') }}
                            <br>
                            <span style="font-size: 10px">
                                {{ $row->barangMasuk->no_transaksi }}
                            </span>
                        </td>


                        <td style="text-align: left; vertical-align: top; white-space: nowrap;">
                            {{ $row->barang->nama_barang }}
                            <br>
                            <span style="font-size: 10px">
                                {{ $row->barang->kode }}
                            </span>
                        </td>
                        <td style="text-align: left; vertical-align: top; white-space: nowrap;">
                            {{ $row->barangMasuk->pemasok->nama_pemasok }}</td>


                        <td style="text-align: center; vertical-align: top; white-space: nowrap;">
                            {{ $row->barang->satuan->nama_satuan }}</td>
                        <td style="text-align: right; vertical-align: top; white-space: nowrap;">Rp.
                            {{ number_format($row->harga) }}</td>
                        <td style="text-align: center; vertical-align: top; white-space: nowrap;">
                            {{ $row->qty }}</td>
                        <td style="text-align: right; vertical-align: top;">
                            Rp.
                            {{ number_format($row->total_harga) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
