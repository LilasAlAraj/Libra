<?php

namespace App\Http\Controllers;

use App\Models\Sessions;
use App\Models\session_attachment;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    // public function index(Request $request)
    // {
    //     $session = Sessions::where('case_id','=',$request->case_id)->get();

    //     return response()->json(['status' => 'success', 'sessions' => $session], 200);
    // }

    public function show($id)
    {
        $sesssion = Sessions::where('id', $id)->first();
        $attachments = $sesssion->attachments;

        $sesssion['attachments']=$attachments;
        return response()->json($sesssion);

    }

    public function store(Request $request)
    {

        Sessions::create([

            'case_id' => $request->case_id,

            'number' => $request->number,

            'date' => $request->date,

            'description' => $request->description,

            // 'delay_date' => $request->delay_date,

            //'delay_reasons'=>$request->delay_reasons,

        ]);
        $id = Sessions::latest()->first()->id;

        if ($request->hasFile('atachments')) {
            $files = $request->file('atachments');
            foreach ($files as $file) {

                $file_name = $file->getClientOriginalName();

                $attachment = new session_attachment();

                $attachment->file_name = $file_name;

                $attachment->session_number = $request->number;

                $attachment->session_id = $id;

                $attachment->save();

                // move pic
                //  $fileName = $request->file_name->getClientOriginalName();

                $file->move(public_path('Attachments/Session_' . $request->number), $file_name);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'تم إضافة الجلسة بنجاح', 'id' => $id], 200);

    }

    public function update(Request $request)
    {

        $id = $request->id;

        $session = Sessions::find($id);

        $session->update([

            'date' => $request->date,

            'description' => $request->description,

            'number' => $request->number,
        ]);

        return response()->json(['status' => 'success', 'message' => 'تم تعديل الجلسة بنجاح'], 200);

    }

    public function destroy(Request $request)
    {

        if (Sessions::find($request->id)->delete()) {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'], 500);
        }

    }
}
