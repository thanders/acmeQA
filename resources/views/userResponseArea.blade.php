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

        <!-- Include admin menu title -->
        @include('menu/userMenuTitle')

            <!-- Include admin menu -->
        @include('menu/userMenu')


        <div class="mainUI">

            @if (\Session::has('submissionStatus'))
                <div class="alert alert-success">

                    {{ \Session::get('submissionStatus')['responseText'] }}

                </div>


            @else

                <h2>Welcome to ACME Limited's Q&A Survey</h2>

                Please fill out the questions below.

                @foreach ($questions as $question)

                    <?php
                        $surveySub = URL::to('/surveySubmit');

                        echo "<form class='' action='$surveySub' method='post'>";


                    echo "<ul class='survey'>";
                            echo "<li class='survey'><b>$question->Question</b></li>";
                            echo "<li class='survey'>";
                            $rowid = $question->rowid;
                            echo "<input class='survey' type=$question->AnswerType name='response$rowid' value='' required></li>";
                            echo "<input type='hidden' name='qID' value='$question->rowid'>";
                            echo "<input type='hidden' name='question' value='$question->Question'>";
                    echo "</ul>";

                ?>

                @endforeach


                @foreach ($MCQ as $questionMCQ)


                    <?php

                        // Declare a variable for rowid for mcq questions
                        $rowid = $questionMCQ->rowid;

                        if ($questionMCQ->AnswerType == 'mcq-radio'){

                            echo "<ul class='survey'>";
                            echo "<li class='survey'><b>$questionMCQ->Question</b></li>";
                            echo "<li class='survey'>";

                            foreach ($mcqOptions as $Options) {
                                $var=$Options-> mcqOption;
                                if ($questionMCQ->rowid==$Options-> Qid){

                                    echo "$var <input type='radio' name='response$rowid' value='$var' required>";
                                }
                            }
                            echo "</li>";

                            }

                        elseif ($questionMCQ->AnswerType == 'mcq-dropDown'){

                            echo "<ul class='survey'>";
                            echo "<li class='survey'><b>$questionMCQ->Question</b></li>";
                            echo "<li class='survey'>";
                            echo "<select name='response$rowid' required>";
                            echo "<option value='' selected disabled hidden>Select an option</option>";

                            foreach ($mcqOptions as $Options) {
                                if ($questionMCQ->rowid==$Options-> Qid){
                                    $var=$Options-> mcqOption;

                                    echo "<option name='response$rowid' value='$var'>$var</option>";
                                }
                            }
                            echo "</select>";
                            echo "</li>";

                    }

                    ?>

                @endforeach

                <?php

                $token =csrf_token();
                echo "<input type='hidden' name='_token' value='$token'>";

                // Submission buttons
                echo "<ul class='submission'>";
                    echo "<li><button type='submit' value='submit'>Submit survey</button></li>";
                    echo "<li>"?> @include('buttons.resetButton')<?php echo "</li>";
                    echo"</ul>";
                    echo "</form>";

                 ?>

            @endif
        </div>


    </body>
</html>
