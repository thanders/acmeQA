<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

        <title>Control Panel - QA Structure Maintenance</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

    <!-- Include admin menu title -->
    @include('menu/adminMenuTitle')

    <!-- Include admin menu -->
    @include('menu.adminMenuDashboard')

    <div class="mainUI">

    <h3> Control Panel - Response Dashboard </h3>

    Number of individual survey submissions: <b>{{ $stats['numResponses'] }}</b>

    </div>

    </body>
</html>
