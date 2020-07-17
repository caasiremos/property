<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('partials.head')
       @yield('stylesheets')
       <style>
           body{
            background: #00B7AF;
           }
       </style>
    </head>
    <body>
        <div id="app">
             @yield('content')
        </div>
        @include('partials.footer')
        @include('partials.scripts')
        @yield('scripts')
    </body>
</html>
