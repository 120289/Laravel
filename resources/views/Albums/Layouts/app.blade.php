<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> {{ config('app.name', 'Laravel') }}</title>
 <script src="{{ asset('js/app.js') }}" defer></script>
 </head>
 <body>
 <div class="container">
 @yield('content')
 </div>
 <script src="{{ asset('js/app.js') }}" type="text/js"></script>
 </body>
</html>
