@extends('pelanggan.layouts.index')

@section('content')
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 offset-md-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="process text-center">
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

        <div class="row">
            <div class="col-md-9 mx-auto inline-block">
                <div class="product-name d-flex">
                    <div class="one-eight text-center">
                        <span>Nama Produk</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>foto</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Price</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Quantity</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Total</span>
                    </div>
                    <div class="one-eight text-center px-4">
                        <span>Remove</span>
                    </div>
                </div>
                @foreach($cart as $c)
                    <div class="product-cart d-flex mx-auto">
                        <div class="one-eight">
                            <div class="display-tc">
                                <h2>{{ $c->merek }}</h2>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price"><img src="{{ asset('img/'.$c->gambar) }}" height="80px" alt=""></span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">Rp. {{ number_format($c->harga) }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">

                                <td><input type="number" name="quantity" id="quantity_change" value="{{ $c->quantity }}" min="1" onkeyup="quantityOnChange({{ $c->id }}, this)"></td>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">Rp. {{ number_format($c->harga * $c->quantity) }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <form action="{{ route('cart_update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="transaksi_id" value="{{ $c->id }}">
                                    <input type="hidden" name="quantity" id="quantity-{{ $c->id }}" value="">

                                    <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</button>
                                </form>
                                <button class="btn btn-danger" onclick="mHapus('{{ route('cart_delete',$c->id) }}')"><i class="fa fa-trash">Del</i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-addtocart">
                    <i class="icon-shopping-cart"></i> checkout</a>

                <button class="btn btn-primary btn-addtocart" style="background-color:#F5F5DC"><a href="{{ route('home') }}"> back to shopping</a></button>
            </div>
        </div>

        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" id="formDelete">
                        <div class="modal-body">
                            @csrf
                            @method('delete')
                            Yakin Hapus Data ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function mHapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }

    function quantityOnChange(idSepatu, element) {
        let quantity = document.getElementById(`quantity-${idSepatu}`);
        quantity.value = element.value;
    }
</script>


<script type="text/javascript">
    let tombolMinus = document.getElementById('minus');
    let tombolPlus = document.getElementById('plus');

    let stockValue = parseInt(document.getElementById("quantity").value);

    tombolPlus.addEventListener("click", function () {
        let hasiltambah = stockValue += 1
        document.getElementById("quantity").value = hasiltambah;
    })

    tombolMinus.addEventListener("click", function () {
        if (stockValue <= 1) {
            document.getElementById("quantity").value = 1;
        } else {
            let hasilminus = stockValue -= 1
            document.getElementById("quantity").value = hasilminus;
            // console.log(hasilminus);
        }
    })

</script>

@endsection
