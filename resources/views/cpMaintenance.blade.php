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
    @include('adminMenuTitle')

    <!-- Include admin menu -->
    @include('adminMenuMaintenance')


    <div class="mainUI">

    <h2>Create new questions</h2>


    <?php


    // define global variables
    $question=null;
    $selectionType=null;

    if (isset($_GET['question']) && (isset($_GET['answerType']))){
        $question = $_GET['question'];
    }

    if (isset($_GET['answerType'])){
        $selectionType = $_GET['answerType'];
    }

    // if Question set and answerType is MCQ
    if (isset($_GET['question']) && isset($_GET['answerType']) && ($_GET['answerType']=='mcq-radio' || $_GET['answerType']=='mcq-dropDown') && !isset($_GET['choicesNumber'])){

        echo "Question: $question <br>";

        echo "<form action='' method='get'>";

        echo "Number of choices <input type='number' name='choicesNumber'/>";
        echo "<input type='hidden'  name='question' value='$question'>";
        echo "<input type='hidden'  name='answerType' value='$selectionType'>";
        echo "<button type='submit'>Submit choices</button>";
        echo "</form>";

    }

    // if question is set and answer type is not equal to mcq
    elseif(isset($_GET['question']) && ($_GET['answerType'] != 'mcq-radio' && $_GET['answerType'] != 'mcq-dropDown')){

        // Form action to post values to /store route
        $action=URL::to('/store');

        echo "<form action='$action' method='post'>";

        echo "Question: $question <br>";
        echo "Question format: $selectionType<br>";


        // if answerType is number
        if ($selectionType == 'number'){
            echo "Solution <input type='number' name='solution'/>";
        }

        // if answerType is text
        if ($selectionType == 'text'){
            echo "Solution <input type='text' name='solution'/>";
        }

        echo "<input type='hidden'  name='question' value='$question'>";
        echo "<input type='hidden'  name='answerType' value='$selectionType'>";
        //create a Laravel token to allow the form to be submitted
        $token=csrf_token();
        echo "<input type='hidden'  name='_token' value='$token'>";
        echo"<button type='submit'>Create question</button>";
        echo "</form>";

    }



    // else if number of choices has been set
    elseif (isset($_GET['choicesNumber']) && (isset($_GET['question']))){

        echo "Question: $question<br>";

        $choicesNumber = $_GET['choicesNumber'];

        echo "Specify the $choicesNumber options<br>";

        $qSubmission = URL::to('/store');

        echo "<form class='' action='$qSubmission' method='post'>";

        for ($i = 0; $i <$choicesNumber; $i++) {
            $opt = $i+1;
            echo "Option $opt <input type='text' name='choice$opt'><br>";
        }

        echo "<input type='hidden'  name='question' value='$question'>";
        echo "<input type='hidden'  name='answerType' value='$selectionType'>";
        echo "<input type='hidden'  name='mcqOptions' value='$opt'>";
        $token =csrf_token();
        echo "<input type='hidden' name='_token' value='$token'>";
        echo"<button type='submit'>Create question</button>";

        echo "</form>";
    }

    // initial form to get question and answerType
    else{
        echo "<form class='' action='' method='get'>";
        echo "Question <input type='text' name='question' value='' placeholder='Enter the question'><br>";
        echo "<input type='radio' name='answerType' value='mcq-radio'> Multiple Choice - Radio<br>";
        echo "<input type='radio' name='answerType' value='mcq-dropDown'> Multiple Choice - Drop-down<br>";
        echo "<input type='radio' name='answerType' value='text'> Text<br>";
        echo "<input type='radio' name='answerType' value='number'> Number<br>";
        echo "<button type='submit'>Submit answer</button>";
        echo "</form>";


    }

    ?>

    <!-- Include a form reset button -->
    @include('resetButton')

        <h2>Manage questions</h2>

        <h4>Text & number</h4>
        <table border = 1>
            <tr>
                <th>Question</th>
                <th>AnswerType</th>
                <th>Solution</th>
                <th>RowID</th>
                <th>Delete</th>
            </tr>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->Question }}</td>
                    <td>{{ $question->AnswerType }}</td>
                    <td>{{ $question->Solution }}</td>
                    <td>{{ $question->rowid }}</td>
                    <td> @include('deleteButton')</td>
                </tr>
            @endforeach
        </table>


        <h4>Multiple choice questions</h4>

        <div class="table">

            <table border = 1>

                <tr>
                    <th>Question</th>
                    <th>AnswerType</th>
                    <th>Options</th>
                    <th>Solution</th>
                    <th>RowID</th>
                    <th>Delete</th>
                </tr>

                @foreach ($MCQ as $questionMCQ)

                <tr>
                    <td>{{ $questionMCQ->Question }}</td>
                    <td>{{ $questionMCQ->AnswerType }}</td>
                    <!-- Loop through options array and print out if Qid == rowid -->
                    <td><?php foreach ($mcqOptions as $Options) { if($Options-> Qid == $questionMCQ->rowid) {echo $Options-> mcqOption.', ';}} ?> </td>
                    <td>{{ $questionMCQ->Solution }}</td>
                    <td>{{ $questionMCQ->rowid }}</td>
                    <td> @include('deleteButtonMCQ')</td>
                </tr>
                @endforeach
            </table>

        </div>

        <form action="/truncateQuestions" method="POST">
            <input type='hidden'  name='truncate' value='yes'>
            <?php

            $token =csrf_token();
            echo "<input type='hidden' name='_token' value='$token'>";

            ?>
            <button>Delete all questions</button>
        </form>

    </div>

    </body>





</html>
