<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Control Panel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Admin Control Panel
                </div>

                <div class="links">
                    <a href="/userResponseArea">User Response Area</a>
                    <a href="/">Landing Page</a>
                </div>
            </div>
        </div>

        <div class="main">

            <h2>Admin Control Panel</h2>

            <h3>Create quiz questions</h3>


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
            @include('resetButton');

        </div>
    </body>
</html>
