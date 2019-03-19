<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Control Panel</title>

        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <!-- Include admin menu title -->
        @include('adminMenuTitle')

        <!-- Include admin menu -->
        @include('adminMenu')


        <div class="mainUI">

            Welcome to the Admin Control Planel. Please choose a link from the menu above.

        </div>
    </body>
</html>
