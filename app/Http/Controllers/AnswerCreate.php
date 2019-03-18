<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

// A controller for handling the Admin Control Panel's question creation form POST messages
class AnswerCreate extends Controller {

    public function store(Request $request){

        print_r($request->input());

        // Insert variables from form (post) into questions table
        $Qid = DB::table('questions')->insertGetId(['Question' => $request-> input('question'), 'AnswerType' => $request-> input('answerType'), 'Solution' => $request-> input('solution')]);

        echo "rowID is $Qid";

        // Check if mcqOptions exists - Obtain user-inputted data from request method:
        if ($request-> input('mcqOptions')){

            $mcqOptions = ($request-> input('mcqOptions'));

            echo "Number of MCQ options:".$request-> input('mcqOptions')."";

            // Loop through the number of mcq Optionsa and insert options into mcqOptions table
            for ($i = 1; $i <=$mcqOptions; $i++) {
                echo "<br>option  number $i";
                $OptID = DB::table('mcqOptions')->insertGetId(['Qid' => $Qid, 'mcqOption' => $request->input("choice".$i."")]);
            }

        }

    }

}
