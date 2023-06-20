<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Send_Attachment;
use Illuminate\Support\Facades\Validator;
use App\Models\Cases;


class SendAttachmentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_name' => 'mimes:pdf,jpeg,png,jpg',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'خطأ في البيانات المرسلة', 'errors' => $validator->errors()], 400);
        }
    
        if (!$request->hasFile('attachment')) {
            return response()->json(['status' => 'error', 'message' => 'لم يتم ارسال المرفق'], 400);
        }
    
        $file = $request->file('attachment');
        if (!$file->isValid()) {
            return response()->json(['status' => 'error', 'message' => 'خطأ في الملف المرفق'], 400);
        }
    
        $file_name = $file->getClientOriginalName();
        $userId = $request->user()->id;
    
        $attachment = new Send_Attachment();
        $attachment->file_name = $file_name;
        $attachment->user_id = $userId;
        $attachment->save();
    
        $path = $file->storeAs('Send_Attachments/User_' . $attachment->user_id, $file_name, 'public');
    
        return response()->json(['status' => 'success', 'message' => 'تم ارسال المرفق بنجاح', 'file_path' => $path]);
    }
}
