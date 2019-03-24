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

    <table border = 1>
        <tr>
            <th colspan="3">View</th>
            <th colspan="3">Update</th>
        </tr>
        <tr>
            <th>Question</th>
            <th>AnswerType</th>
            <th>RowID</th>
            <th>Update Question</th>
            <th colspan="2">Modify</th>

        </tr>
        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->Question }}</td>
                <td>{{ $question->AnswerType }}</td>
                <td>{{ $question->rowid }}</td>
                <td> @include('updateQuestionForm')</td>
                <td> @include('buttons.deleteButton')</td>

            </tr>
    @endforeach

    </table>


    </body>
</html>
