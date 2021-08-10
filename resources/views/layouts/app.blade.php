<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>
    
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    @livewireStyles
</head>

<body class="bg-gray-100">
    @include('partials.top-bar')
    <div class="h-screen flex flex-row flex-wrap">
        <!-- start sidebar -->
        @include('partials.sidebar')
        <!-- end sidbar -->
        <!-- strat content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            @yield('content')
        </div>
        <!-- end content -->
    </div>
    <!-- end wrapper -->
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#exampleModal').modal('hide');
        });
        
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('libs/select2/dist/js/select2.js') }}" defer></script>
<link href="{{ asset('libs/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/select2/dist/css/select2-bootstrap4.min.css') }}" rel="stylesheet">
<script>
 $(document).ready(function() {
    $('.select2').select2({
        theme: 'bootstrap4',
    });

});
</script>

</body>

</html>