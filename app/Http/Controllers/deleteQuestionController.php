<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class deleteQuestionController extends Controller {

    // Truncate the data the questions and mcqOptions tables
    public function deleteQuestion($rowid) {

        $AnswerType = DB::table('questions')->where('rowid', [$rowid])->value('AnswerType');

        // If not equal to mcq, delete from questions table
        if ($AnswerType != 'mcq-dropDown' && $AnswerType != 'mcq-radio' ) {
            DB::delete('DELETE FROM questions WHERE rowid = ?', [$rowid]);

        }

        // Else delete from questions and mcqOptions table
        else{

            DB::table('mcqOptions')->where('Qid', '=', [$rowid])->delete();
            DB::delete('DELETE FROM questions WHERE rowid = ?', [$rowid]);
        }

        return redirect()->to('/cpMaintenance');

    }
}
