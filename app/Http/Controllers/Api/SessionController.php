<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sessions;
use App\Models\Cases;

class SessionController extends Controller
{
    public function CaseSessions($caseId)
    {
        $case = Cases::find($caseId);

    if (!$case) {
        return response()->json(['status' => 'error', 'message' => 'لم يتم العثور على القضية'], 404);
    }

    $sessions = $case->sessions;
    if ($sessions->isEmpty()) {
        
        return response()->json(['status' => 'success', 'message' => 'لا يوجد جلسات متعلقة بهذه القضية']);
    }
    return response()->json(['status' => 'success', 'sessions' => $sessions]);

    }
}
