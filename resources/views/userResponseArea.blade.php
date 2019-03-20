<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

        <title>User Response Area</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <!-- Include admin menu title -->
        @include('menu/userMenuTitle')

            <!-- Include admin menu -->
        @include('menu/userMenu')



    </body>
</html>
