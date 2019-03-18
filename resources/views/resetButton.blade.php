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

    <?php
        // Reset button as a new form
        echo "<form class='' action='/adminControlPanel'>";
            echo "<button type='submit'>Reset</button>";
            echo "</form>";

    ?>


    </body>
</html>
