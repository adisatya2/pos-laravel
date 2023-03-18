<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>
</head>
<style>
    .text-center {
        text-align: center;
    }

    .b-1 {
        border: 1px solid black;
    }
</style>

<body>
    <table width="100%">
        <tr>
            @foreach ($dataProduk as $key => $produk)
                <td class="text-center b-1">
                    <p>{{ $produk->nama_produk }} - {{ format_uang_rp($produk->harga_jual) }}</p>
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($produk->kode_produk, 'C39') }}"
                        alt="{{ $produk->kode_produk }}" width="180" height="60">
                    <br>
                    {{ $produk->kode_produk }}
                </td>
                @if (($key + 1) % 3 == 0)
        </tr>
        <tr>
            @endif
            @endforeach
        </tr>
    </table>
</body>

</html>
