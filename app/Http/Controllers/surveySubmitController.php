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



        $rowidarr = DB::select('select rowid from Questions;');

        // Check to make sure posted requests exist for each question in the database, if true, insert responses for those questions
        foreach ($rowidarr as $rowid ) {


                if ("response{$rowid->rowid}"){
                    $responseID = $rowid->rowid;
                    $response = "response{$rowid->rowid}";
                    DB::table('responses')->insert(['ResponseID' => $responseID, 'Response' => $request->input($response)]);
                }
            }

        return redirect()->back()->with('success', ['Thanks for answering the quiz questions. A summary of your submission is below (Not yet implemented']);

    }

}
