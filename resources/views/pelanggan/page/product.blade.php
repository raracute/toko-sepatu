@extends('pelanggan.layouts.index')

@section('content')
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-md">
            @foreach($produk as $p)
                <div class="col-lg-4 mb-5 text-center">
                    <div class="product-entry border" style="background-color: #F0FFF0;">
                        <a href="{{ route('detail', $p->kode_sepatu) }}" class="prod-img">
                            <img src="{{ asset('img/'.$p->gambar) }}" height="180px" class="mt-3" alt="">
                        </a>
                        <div class="desc">
                            <h4><a href="#">{{ $p->merek }}</a></h4>
                            <span class="price">Rp. {{ number_format($p->harga) }}</span>
                        </div>

                        <p class=""><a href="{{ route('detail', $p->kode_sepatu) }}" class="btn btn-primary"> Detail</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
