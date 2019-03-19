<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class deleteQuestionController extends Controller {

    // Truncate the data the questions and mcqOptions tables
    public function deleteQuestion($rowid) {

        $AnswerType = DB::table('questions')->where('rowid', [$rowid])->value('AnswerType');

        print_r($AnswerType);

        echo $AnswerType;


        if ($AnswerType != 'mcq-dropDown') {
            DB::delete('DELETE FROM questions WHERE rowid = ?', [$rowid]);
            echo "yes";

        }

        else{

            DB::table('mcqOptions')->where('Qid', '=', [$rowid])->delete();
            DB::delete('DELETE FROM questions WHERE rowid = ?', [$rowid]);
        }

}}
