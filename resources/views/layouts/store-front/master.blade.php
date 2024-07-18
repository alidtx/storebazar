<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('layouts.store-front.header_assets')
    <title>sslwireless - UNDP</title>
    <style>
        .dataTables_filter {
            margin-bottom:10px !important
        }
    </style>
</head>

<body>
    @include('layouts.partial._preloader')
    @yield('content')
    @include('layouts.store-front.footer_assets')

</body>

</html>