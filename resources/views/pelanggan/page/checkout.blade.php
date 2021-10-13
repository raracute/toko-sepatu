@extends('pelanggan.layouts.index')
@section('content')
<div class="colorlib-product">
    <div class="px-5">
        <div class="row row-pb-lg">
            <div class="col-sm-10 offset-md-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>02</span></p>
                        <h3>Checkout</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Order Complete</h3>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="{{ route('checkout_create') }}" class="row">
            @csrf
            <div class="col-lg-7">
                <div class="row colorlib-form">
                    <h2>Detail Checkout</h2>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kurir">Pilih Kurir</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="kurir" id="kurir" class="form-control" onchange="kurirOnChange(this)">
                                            @foreach($kurir as $item)
                                                <option value={{ $item['id_kurir'] }} data-harga="{{ $item['harga'] }}">{{ $item['perusahaan_kurir'] }} - {{ $item['tipe_kurir'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ongkir">Ongkir</label>
                                    <div class="form-field">
                                        <input type="number" class="form-control" id="ongkir" name="ongkir" disabled value="{{ $kurir[0]['harga'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname">Alamat</label>
                            <textarea class="form-control" name="alamat" id="" cols="30" rows="10" placeholder="alamat anda"></textarea>
                            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-detail">
                            <h2>Keranjang Anda</h2>
                            <ul>
                                <li>
                                    <ul>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($sepatu as $item)
                                            @php
                                                $totalPerItem = 0;
                                                if ($item['quantity'] > 3) {
                                                $totalPerItem += (int)$item['harga'] - ((int)$item['harga'] * 0.15);
                                                } else {
                                                $totalPerItem += (int)$item['harga'];
                                                }
                                                $total += $totalPerItem;
                                            @endphp
                                            @if($item['quantity'] > 3)
                                                <li>
                                                    <span><del>{{ $item['quantity'] }} x {{ $item['merek'] }}</del></span>
                                                    <span><del>Rp. {{ number_format($item['harga']) }}</del></span>
                                                </li>
                                            @else
                                                <li>
                                                    <span>{{ $item['quantity'] }} x {{ $item['merek'] }}</span>
                                                    <span>Rp. {{ number_format($item['harga']) }}</span>
                                                </li>
                                            @endif

                                            @if($item['quantity'] > 3)
                                                <li>
                                                    <span>{{ $item['quantity'] }} x {{ $item['merek'] }}. Disc 15% Off</span>
                                                    <span>Rp. {{ number_format($totalPerItem) }}</span>
                                                </li>
                                            @endif

                                            @if($errors->any())
                                                @foreach(json_decode($errors, true) as $error)
                                                    @if($error['id'] == $item['id_sepatu'])
                                                    <li>
                                                        <small class="text-danger">Stok tersedia hanya {{ $error['availableStock'] }}</small>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li><span>Order Total</span> <span>Rp. {{ number_format($total) }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="w-100"></div>

                    <div class="col-md-12">
                        <div class="cart-detail">
                            <h2>Metode Pembayaran</h2>
                            <div class="form-group">
                                <div class="radio">
                                    <input type="radio" name="pembayaran" value="bank">
                                    <label>Tranfer Via Bank</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="radio">
                                    <input type="radio" name="pembayaran" value="cod">
                                    <label>COD</label>
                                </div>
                            </div>

                            @error('pembayaran') <small class="text-danger">{{ $message }}</small> @enderror

                                <div class="form-group">
                                    <label><input type="checkbox" value="">I have read and accept the terms and conditions</label>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Lakukan Pemesanan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function kurirOnChange(element) {
        let ongkir = document.getElementById('ongkir');
        let harga = $("#kurir :selected").data('harga');
        ongkir.value = harga;
    }

</script>
@endsection
