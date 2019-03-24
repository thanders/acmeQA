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

    <table class="admin">
        <tr class="admin">
            <th class="admin" colspan="3">View</th>
            <th class="admin" colspan="3">Update</th>
        </tr>

        <tr class="adminSubHeading">
            <th class="adminSubHeading">Question</th>
            <th class="adminSubHeading">AnswerType</th>
            <th class="adminSubHeading">Update Question</th>
            <th class="adminSubHeading" colspan="2">Modify</th>

        </tr>
        @foreach ($questions as $question)
            <tr class="admin">
                <td class="admin">{{ $question->Question }}</td>
                <td class="admin">{{ $question->AnswerType }}</td>
                <td class="admin"> @include('updateQuestionForm')</td>
                <td class="admin"> @include('buttons.deleteButton')</td>

            </tr>
    @endforeach

    </table>


    </body>
</html>
