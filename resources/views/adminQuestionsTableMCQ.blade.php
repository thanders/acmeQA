<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

        <title>User Response Area</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

    <table class="admin">

        <tr class="admin">
            <th class="admin" colspan="4">View</th>
            <th class="admin" colspan="3">Update</th>
        </tr>

        <tr class="admin">
            <th class="adminSubHeading" >Question</th>
            <th class="adminSubHeading">AnswerType</th>
            <th class="adminSubHeading">Options</th>
            <th class="adminSubHeading">Update Question</th>
            <th class="adminSubHeading" colspan="2">Modify</th>
        </tr>

        @foreach ($MCQ as $questionMCQ)

            <tr class="admin">
                <td class="admin">{{ $questionMCQ->Question }}</td>
                <td class="admin">{{ $questionMCQ->AnswerType }}</td>
                <!-- Loop through options array and print out if Qid == rowid -->
                <td class="admin"><?php foreach ($mcqOptions as $Options) { if($Options-> Qid == $questionMCQ->rowid) {echo $Options-> mcqOption.', ';}} ?> </td>
                <td class="admin"> @include('updateQuestionMCQForm')</td>
                <td class="admin"> @include('buttons.deleteButtonMCQ')</td>
            </tr>
        @endforeach
    </table>


    </body>
</html>
