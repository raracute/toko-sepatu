@extends('pelanggan.layouts.index')

@section('content')
<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card my-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            @php
                                // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
                                $status = '';
                                if ($transaksi->status == 1) {
                                $status = 'Menunggu Pembayaran';
                                } else if ($transaksi->status == 2) {
                                $status = 'Pembayaran Berhasil';
                                } else if ($transaksi->status == 3) {
                                $status = 'Barang Dikemas';
                                } else if ($transaksi->status == 4) {
                                $status = 'Barang Dikirim';
                                } else if ($transaksi->status == 5) {
                                $status = 'Pesanan Dibatalkan';
                                }
                            @endphp
                            <div>{{ $status }}</div>
                            <div>Rp. {{ number_format($transaksi->totalharga) }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <ul>
                                @foreach($transaksiDetail as $item)
                                    <li class="d-flex justify-content-between">
                                        <p>{{ $item['quantity'] }} x {{ $item['merek'] }}</p>
                                        @php
                                            // discount logic
                                            $total = 0;
                                            $totalOri = $item['quantity'] * $item['harga'];
                                            if ($item['quantity'] > 3) {
                                                $total = $totalOri - ($totalOri * 0.15);
                                            } else {
                                                $total = $totalOri;
                                            }
                                        @endphp

                                        @if ($item['quantity'] > 3)
                                            <p>Rp. {{ number_format($item['harga']) }} = <del>Rp. {{ number_format($totalOri) }}</del><br>(Disc. 15%) Rp. {{ number_format($total) }}</p>
                                        @else
                                            <p>Rp. {{ number_format($item['harga']) }} = Rp. {{ number_format($total) }}</p>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="container mt-5">
                            <p>{{ $transaksi->alamat_pengiriman }}</p>
                        </div>
                        <div class="container">
                            <p class="float-right">{{ $transaksi->tanggal_transaksi }}</p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div>Kurir {{ $transaksi->kurir_pengirim }}</div>
                            <div>Rp. {{ number_format($transaksi->ongkir) }}</div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div>Total</div>
                            <div>Rp. {{ number_format($transaksi->ongkir + $transaksi->totalharga) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($transaksi->status == 1 && $transaksi->metode_pembayaran == 'bank')
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <form action="{{ route('history_payment_view', ['id_transaksi' => $transaksi->id_transaksi]) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                @foreach($bank as $item)
                                    <div class="form-check">
                                        <div class="radio">
                                            <input class="form-check-input" type="radio" name="bank" value="{{ $item['id'] }}">
                                            <label class="form-check-label d-flex justify-content-between">
                                                <div>{{ $item['nama_bank'] }}</div>
                                                <div>{{ $item['norek'] }} A/n {{ $item['atas_nama'] }}</div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="input-group mb-3 mt-5">
                                    <label class="input-group-text" for="bukti_pembayaran">Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-success btn-block" type="submit">Lakukan Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
