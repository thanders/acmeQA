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
        $qUpdate = URL::to("/updateQuestion");
        echo "<form class='' action='$qUpdate' method='post'>";
        $token =csrf_token();
        echo "<input type='hidden' name='_token' value='$token'>";
        echo "<input type='hidden'  name='rowid' value='$questionMCQ->rowid'>";
        echo "<input type='text' name='question' value=''>";
        echo "<td><button type='submit'> Update </button></td>";
        echo "</form>";
        ?>


    </body>
</html>
