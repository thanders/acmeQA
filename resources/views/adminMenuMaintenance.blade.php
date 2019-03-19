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

    <ul class="topnav">
        <li><a href="/">Home</a></li>
        <li><a href="/adminControlPanel">Admin Control Panel</a></li>
        <li><a class="active" href="/qaMaintenance">Q&A Structure Maintenance</a></li>
        <li><a href="/cpResponseDashboard">Response Dashboard</a></li>

    </ul>

    </body>
</html>
