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
    echo "<input type='hidden'  name='question' value='$question' required>";
    echo "<input type='hidden'  name='answerType' value='$selectionType' required>";
    echo "<button type='submit'>Submit choices</button>";
    echo "</form>";

}

// if question is set and answer type is not equal to mcq
elseif(isset($_GET['question']) && ($_GET['answerType'] != 'mcq-radio' && $_GET['answerType'] != 'mcq-dropDown')){

echo "Please confirm your submission:";
// Form action to post values to /store route
$action=URL::to('/store');

echo "<form action='$action' method='post'>";

echo "<br>Question: $question <br>";
echo "Question format: $selectionType<br><br>";

echo "<input type='hidden'  name='question' value='$question' required>";
echo "<input type='hidden'  name='answerType' value='$selectionType' required>";
//create a Laravel token to allow the form to be submitted
$token=csrf_token();
echo "<input type='hidden'  name='_token' value='$token'>";

// Submission buttons
echo "<ul class='submission'>";
echo "<li><button type='submit'>Create question</button></li>";
echo "<li>"?> @include('buttons.resetButtonAdminQuestions')<?php echo "</li>";
echo"</ul>";



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

    echo "<input type='hidden'  name='question' value='$question' required>";
    echo "<input type='hidden'  name='answerType' value='$selectionType' required>";
    echo "<input type='hidden'  name='mcqOptions' value='$opt'>";
    $token =csrf_token();
    echo "<input type='hidden' name='_token' value='$token'>";
    echo"<button type='submit'>Create question</button>";

    echo "</form>";
}

// initial form to get question and answerType
else{
    echo "<form class='' action='' method='get'>";
    echo "Question <input type='text' name='question' value='' placeholder='Enter the question' required><br>";
    echo "<input type='radio' name='answerType' value='mcq-radio' required> Multiple Choice - Radio<br>";
    echo "<input type='radio' name='answerType' value='mcq-dropDown' required> Multiple Choice - Drop-down<br>";
    echo "<input type='radio' name='answerType' value='text' required> Text<br>";
    echo "<input type='radio' name='answerType' value='number'> Number<br>";
    // Submission buttons
    echo "<ul class='submission'>";
    echo "<li><button type='submit'>Create question</button></li>";
    echo "<li>"?> @include('buttons.resetButtonAdminQuestions')<?php echo "</li>";
    echo"</ul>";
    echo "</form>";
}

?>
