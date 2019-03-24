<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Control Panel - QA Structure Maintenance</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>

    <body>

        <!-- Include admin menu title -->
        @include('menu/adminMenuTitle')

        <!-- Include admin menu -->
        @include('menu.adminMenuMaintenance')

    <div class="mainUI">

        <h2>Create new questions</h2>

        @include('adminQuestionsCreate')

        <!-- Displaying Questions starts here -->
        <h2>Manage questions</h2>

        <h4>Text & number</h4>

        <div class="table">

            <!-- include the questions table -->
            @include('adminQuestionsTable')

        </div>

        <h4>Multiple choice questions</h4>

        <div class="table">
        <!-- include the MCQ questions table -->
            @include('adminQuestionsTableMCQ')

        </div>

        <!-- Include the button to delete all questions -->
        @include('buttons/deleteButtonAllQuest')

    </div>

    </body>

</html>
