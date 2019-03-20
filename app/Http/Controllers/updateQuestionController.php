<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class updateQuestionController extends Controller {

    // Truncate the data the questions and mcqOptions tables
    public function updateQuestion(Request $request) {

        // assign request parameter to variable
        $question = $request->input('question');

        $rowid = $request->input('rowid');

        //executequery:
        DB::table('questions')->where('rowid', $rowid)->update(['Question' => $question]);

        return redirect()->to('/cpMaintenance');

    }
}
