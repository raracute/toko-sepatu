@extends('pelanggan.layouts.index')

@section('content')
<div class="container">
    <div class="mt-3">
        <div class="card md-12">
            <div class="card-body mt-3 ">
                <div class="row">
                    <div class="col-sm-6 mb-3 ">
                        <a href="#" class="prod-img">
                            <img src="{{ asset('img/'.$detail->gambar) }}" height="350px" alt="">
                        </a>

                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="product-desc">
                            <div class="price">
                                <h2>{{ $detail->merek }}</h2>
                                <h4>Rp.{{ $detail->harga }}</h4>
                                <span class="rate">
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-full"></i>
                                    <i class="icon-star-half"></i>
                                    (74 Rating)
                                </span>

                                <div class="mt-5">
                                    <div class="form-group">
                                        <h4>Size</h4>
                                        <select name="size" id="size" class="form-control" style="width: 200px; color: black;">
                                            <option>{{ $detail->ukuran-2 }}</option>
                                            <option>{{ $detail->ukuran-1 }}</option>
                                            <option selected>{{ $detail->ukuran }}</option>
                                            <option>{{ $detail->ukuran+1 }}</option>
                                            <option>{{ $detail->ukuran+2 }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <form class="mt-4" action="{{ route('cart_create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_sepatu" value="{{ $detail->id_sepatu }}">
                                <h4>Jumlah</h4>
                                <div class="input-group sm-4">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn" data-type="minus" id="minus" data-field="">
                                            <i class="icon-minus2"></i>
                                        </button>
                                    </span>

                                    <!-- <input type="text" value=""> -->
                                    <input type="text" id="quantity" name="quantity" size="10" value="1" min="1" max="100">
                                    <span class="input-group-btn ml-1">
                                        <button type="button" class="quantity-right-plus btn" data-type="plus" id="plus" data-field="">
                                            <i class="icon-plus2"></i>
                                        </button>
                                    </span>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-4 ">
                                        <button type="submit" target=""><i class="icon-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row d-flex flex-column pl-3">
                    <h5>Kategori</h5>
                    <p>{{ $detail->kategori }}</p>
                    <h5>Keterangan</h5>
                    <p>{{ $detail->ket }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


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
