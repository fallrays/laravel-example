<!DOCTYPE html>
<html lang='ko'>
<head>
    <base href=""/>
    <title>@yield('page-title')</title>

    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    @yield('page-style')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>

    @include('layouts.partials.template_header')

    @include('layouts.partials.template_sidebar')

    @yield('page-content')

    @yield('page-script')

</body>
</html>