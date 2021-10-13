<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>

    <link rel="stylesheet" href="{{ public_path('/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- <link rel="stylesheet" href="{{ public_path('/backend/dist/css/adminlte.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ public_path('/templaterades/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <h1>Report Page</h1>

        <p>Report Penjualan - {{ $tanggal }}</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Ongkir</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $jumlahTerjual = 0;
                    $pendapatan = 0;
                    $sisaStok = DB::table('tb_sepatu')
                    ->sum('jumlah_Stok');
                @endphp
                @foreach($transaksi as $item)
                    @php
                        $nama = DB::table('users')
                        ->where('id', $item['pelanggan_id'])
                        ->first()
                        ->name;

                        $jumlah = DB::table('tb_transaksi_detail')
                        ->where('id_transaksi', $item['id_transaksi'])
                        ->sum('quantity');

                        $jumlahTerjual += $jumlah;
                        $pendapatan += $item['totalharga'];
                    @endphp

                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $nama }}</td>
                        <td>{{ $jumlah }}</td>
                        <td>Rp. {{ number_format($item['ongkir'] ) }}</td>
                        <td>Rp. {{ number_format($item['totalharga']) }}</td>
                    </tr>
            </tbody>
            @endforeach
        </table>

        <div>
            <p>Total transaksi : {{ count($transaksi) }}</p>
            <p>Total barang terjual : {{ $jumlahTerjual }}</p>
            <p>Total sisa stok : {{ $sisaStok }}</p>
            <p>Total pendapatan : {{ number_format($pendapatan) }}</p>
        </div>
    </div>
</body>

</html>
