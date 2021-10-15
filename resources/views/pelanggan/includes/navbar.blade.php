<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-9">
                    <div id="colorlib-logo"><a>Ainy Shoes</a></div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <form action="{{ route('home-search') }}" class="search-wrap" method="GET">
                        <div class="form-group">
                            <input type="search" class="form-control search" name="keyword" placeholder="Search">
                            <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>
                        <li>
                            <font size="5"><a href="{{ route('home') }}">Beranda</a></font>
                        </li>
                        <li>
                            <font size="5"><a href="{{ route('home-produk') }}">Produk</a></font>
                        </li>
                        <li>
                            <font size="5"><a href="{{ route('contact') }}">Kontak</a></font>
                        </li>

                        @guest
                        @if(Route::has('login'))
                        <li class="cart">
                            <font size="5"><a href="{{ route('login') }}">{{ __('Login') }}</a></font>
                        </li>
                        @endif
                        @else
                        <li class="cart">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="icon-user"></i>
                                <font size="5">
                                    {{ Auth::user()->name }}
                                </font>
                            </a>

                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="cart"><a href={{ route('history_view') }}><i class="icon-file-text">
                                    <font size="5">Riwayat
                                </i></font></a></li>
                        <li class="cart"><a href={{ route('cart_view') }}><i class="icon-shopping-cart">
                                    <font size="5">Keranjang</font>
                                </i></a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>