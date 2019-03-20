<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

// A controller for handling the Admin Control Panel's question creation form POST messages
class surveySubmitController extends Controller {

    public function insertUserSubmission(Request $request){

        // assign request parameters to variables
        $question = $request->input('question');
        $qID = $request->input('qID');
        $response = $request->input('response23');
        $numQuestions = $request->input('numQuestions');

        echo "Question: $question<br>";
        echo "qID: $qID<br>";
        echo "Response: $response<br>";
        echo "Number of Questions: $numQuestions";

        $rowidarr = DB::select('select COUNT(rowid) from Questions;');

        $data= json_decode( json_encode($rowidarr), true);

        //$count =$data['COUNT(Question)'];
        print_r($data);
        //echo "count again: $data";

        $rowidSize =sizeof($rowidarr);

        for ($i = 0; $i <= $rowidSize; $i++) {
            echo "The number is: $i <br>";
            //$Qid = DB::table('responses')->insertGetId(['ResponseID' => "response$i", 'AnswerType' => $request-> input('answerType'), 'Solution' => $request-> input('solution')]);
        }
        //return redirect()->to('/cpMaintenance');

    }

}
