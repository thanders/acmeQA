<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Response Area</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

    <form action="/deleteQuestion/{{ $question->rowid }}" method="POST">

        <?php

        $token =csrf_token();
        echo "<input type='hidden' name='_token' value='$token'>";

        ?>

        <button>Delete</button>
    </form>


    </body>
</html>
