<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Decision;
use App\Models\Cases;


class DecisionController extends Controller
{
    public function CaseDecision($caseID){

        $case = Cases::find($caseID);

        if (!$case) {
            return response()->json(['status' => 'error', 'message' => 'لا يوجد قرار للقضية'], 404);
        }

        $decisions =$case->decisions;
        if ($decisions->isEmpty()) {
            return response()->json(['status' => 'success', 'message' => 'لا يوجد قرارات صدرت لهذه القضية بعد']);
        }
        return response()->json(['status' => 'success', 'decisions' => $decisions]);
    }
}
