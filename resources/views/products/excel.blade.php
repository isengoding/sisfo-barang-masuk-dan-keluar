<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Product</title>
</head>

<body>

    <h4>PT. XYZ</h4>
    <p>Jl. Lembah Bening No 111</p>
    <p>Pluta City - Jupiter</p>
    <p>Phone Number : 01212234234</p>

    <p></p>
    <p>Data Product</p>
    <p>Total : {{ $products->count() }}</p>
    <p></p>

    <table>
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black">No</th>
                <th style="text-align:center; border: 1px solid black">Code</th>
                <th style="text-align:center; border: 1px solid black">Product Name</th>
                <th style="text-align:center; border: 1px solid black">Brand</th>
                <th style="text-align:center; border: 1px solid black">Price</th>
                <th style="text-align:center; border: 1px solid black">Stock</th>
                <th style="text-align:center; border: 1px solid black">Description</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($products as $row)
                <tr>
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->code }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->name }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ optional($row->brand)->name }}</td>
                    <td style="text-align:right; border: 1px solid black">{{ number_format($row->price) }}
                    <td style="text-align:center; border: 1px solid black">{{ $row->stock }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->description }}</td>

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
