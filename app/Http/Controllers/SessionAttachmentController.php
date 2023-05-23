<?php

namespace App\Http\Controllers;

use App\Models\session_attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SessionAttachmentController extends Controller
{

    public function store(Request $request)
    {
        // $this->validate($request, [

        //     'file_name' => 'mimes:pdf,jpeg,png,jpg',

        // ], [
        //     'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        // ]);

        $file = $request->file('attachment');

        $file_name = $file->getClientOriginalName();

        $attachment = new session_attachment();

        $attachment->file_name = $file_name;

        $attachment->session_number = $request->number;

        $attachment->session_id = $request->session_id;

        $attachment->save();

        $id = session_attachment::latest()->first()->id;

        $file->move(public_path('Attachments/Session_' . $request->number), $file_name);
        return response()->json(['status' => 'success', 'message' => 'تم اضافة المرفق بنجاح', 'id' => $id]);

    }

    public function destroy(Request $request)
    {
        $attachment = session_attachment::findOrFail($request->id_file);

        if ($attachment->delete()) {
            Storage::disk('public_uploads')->delete($request->session_number . '/' . $request->file_name);

            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'], 500);
        }
    }

    public function get_file($cases_number, $file_name)
    {
        $contents = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($cases_number . '/' . $file_name);

        return Storage::download($contents);

    }


}
