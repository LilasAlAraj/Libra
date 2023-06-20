<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Case_attachment;
use App\Models\Cases;

class CaseAttachmentController extends Controller
{
    public function CaseAttashments($caseId){

        $case = Cases::find($caseId);

        if (!$case) {
            return response()->json(['status' => 'error', 'message' => 'لم يتم العثور على القضية'], 404);
        }

        $attachments =$case->attachments;
        if ($attachments->isEmpty()) {
            return response()->json(['status' => 'success', 'message' => 'لا يوجد مرفقات لهذه القضية']);
        }
        return response()->json(['status' => 'success', 'attachments' => $attachments]);
    }
}
