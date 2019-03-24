<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// A controller for handling the Admin Control Panel's question creation form POST messages
class AnswerCreate extends Controller {

    public function store(Request $request){

        // Insert variables from form (post) into questions table
        $Qid = DB::table('questions')->insertGetId(['Question' => $request-> input('question'), 'AnswerType' => $request-> input('answerType')]);

        // Check if mcqOptions exists - Obtain user-inputted data from request method:
        if ($request-> input('mcqOptions')){

            $mcqOptions = ($request-> input('mcqOptions'));

            // Loop through the number of mcq Options and insert options into mcqOptions table
            for ($i = 1; $i <=$mcqOptions; $i++) {
                echo "<br>option  number $i";
                $OptID = DB::table('mcqOptions')->insertGetId(['Qid' => $Qid, 'mcqOption' => $request->input("choice".$i."")]);
            }

        }

        return redirect()->to('/cpMaintenance');

    }

}
