@extends('pelanggan.layouts.index')

@section('content')
<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                @foreach($transaksi as $item)
                    <div class="card my-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                @php
                                    // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
                                    $status = '';
                                    if ($item['status'] == 1) {
                                    $status = 'Menunggu Pembayaran';
                                    } else if ($item['status'] == 2) {
                                    $status = 'Pembayaran Berhasil';
                                    } else if ($item['status'] == 3) {
                                    $status = 'Barang Dikemas';
                                    } else if ($item['status'] == 4) {
                                    $status = 'Barang Dikirim';
                                    } else if ($item['status'] == 5) {
                                    $status = 'Pesanan Dibatalkan';
                                    }
                                @endphp
                                <div>{{ $status }}</div>
                                <div>Rp. {{ number_format($item['totalharga']) }}</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p>{{ $item['alamat_pengiriman'] }}</p>
                            </div>
                            <div class="row float-right">
                                <p>{{ $item['tanggal_transaksi'] }}</p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <div>Kurir {{ $item['kurir_pengirim'] }}</div>
                                <div>Rp. {{ number_format($item['ongkir']) }}</div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <div>Total</div>
                                <div>Rp. {{ number_format($item['ongkir'] + $item['totalharga']) }}</div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <div><a class="btn btn-primary w-50" href="{{ route('history_detail_view', ['id_transaksi' => $item['id_transaksi']]) }}">Detail</a></div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
