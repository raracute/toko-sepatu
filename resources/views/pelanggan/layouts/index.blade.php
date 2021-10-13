<!DOCTYPE HTML>
<html>

<head>
    <title>shoes store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('pelanggan.includes.header')


</head>

<body>
    <div class="colorlib-loader"></div>

    <div id="page">

        @include('pelanggan.includes.navbar')
        @yield('content')


        @include('pelanggan.includes.footer')
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

    @include('pelanggan.includes.script')

</body>

</html>