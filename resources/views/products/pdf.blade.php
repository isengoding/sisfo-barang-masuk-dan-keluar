<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Product</title>
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

                <div style="font-size: 24px">PT. PATRIA TUJUH PETALA</div>
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
        <p style="font-size: 18px"><strong><u>Laporan Data Produk</u></strong></p>

    </div>
    <div class="page">

        <table class="layout display responsive-table" style="font-size: 12px">
            <thead>
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center; white-space: nowrap;">Gambar</th>
                    <th style="text-align: center; white-space: nowrap;">Product Name</th>
                    <th style="text-align: center; white-space: nowrap;">Brand</th>
                    <th style="text-align: center">Stock</th>
                    <th style="text-align: center">Price</th>
                    <th style="text-align: center">Description</th>



                </tr>
            </thead>
            <tbody>
                @forelse ($products as $row)
                    <tr>
                        <td style="text-align: center; vertical-align: top;">{{ $loop->iteration }}</td>
                        <td style="text-align: center; vertical-align: top;">
                            <img width="32px" height="32px" src="data:image/png;base64,{{ $row->image_base_64 }}"
                                alt="">
                        </td>
                        <td style="text-align: left; vertical-align: top; white-space: nowrap;">
                            {{ $row->name }}</td>
                        <td style="text-align: center; vertical-align: top; white-space: nowrap;">
                            {{ $row->brand->name }}</td>
                        <td style="text-align: center; vertical-align: top; white-space: nowrap;">
                            {{ $row->stock }}</td>
                        <td style="width: 150px; text-align: right; vertical-align: top;">Rp.
                            {{ number_format($row->price) }}</td>
                        <td style="text-align: left; vertical-align: top;">{{ $row->description }}</td>
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
