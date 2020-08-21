<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {{-- rechaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- fontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
</head>
<body style="background: rgb(105, 170, 155);">
    <div id="app">
        <main class="py-0">
            @yield('content')
        </main>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
    
</body>
</html>
