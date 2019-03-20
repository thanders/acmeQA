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
            <th colspan="4">View</th>
            <th colspan="3">Update</th>
        </tr>

        <tr>
            <th>Question</th>
            <th>AnswerType</th>
            <th>Options</th>
            <th>RowID</th>
            <th>Update Question</th>
            <th colspan="2">Modify</th>
        </tr>

        @foreach ($MCQ as $questionMCQ)

            <tr>
                <td>{{ $questionMCQ->Question }}</td>
                <td>{{ $questionMCQ->AnswerType }}</td>
                <!-- Loop through options array and print out if Qid == rowid -->
                <td><?php foreach ($mcqOptions as $Options) { if($Options-> Qid == $questionMCQ->rowid) {echo $Options-> mcqOption.', ';}} ?> </td>
                <td>{{ $questionMCQ->rowid }}</td>
                <td> @include('updateQuestionMCQForm')</td>
                <td> @include('deleteButtonMCQ')</td>
            </tr>
        @endforeach
    </table>


    </body>
</html>
