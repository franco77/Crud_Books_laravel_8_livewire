<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>


    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body{background-color:#eee;display:flex;justify-content:center;align-items:center;height:100vh}.card{width:400px;padding:20px;border:none}.account{font-weight:500;font-size:17px}.contact{font-size:13px}.form-control{text-indent:14px}.form-control:focus{color:#495057;background-color:#fff;border-color:#4a148c;outline:0;box-shadow:none}.inputbox{margin-bottom:10px;position:relative}.inputbox i{position:absolute;left:8px;top:12px;color:#dadada}.form-check-label{font-size:13px}.form-check-input{width:14px;height:15px;margin-top:5px}.forgot{font-size:14px;text-decoration:none;color:#4a148c}.mail{color:#4a148c;text-decoration:none}.form-check{cursor:pointer}.btn-primary{color:#fff;background-color:#4a148c;border-color:#4a148c}
    </style>
    @livewireStyles
</head>


<body>
    
        @yield('content')
    
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>