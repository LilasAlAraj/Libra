<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Sessions;
use App\Models\session_attachment;
use Illuminate\Http\Request;

class SessionController extends Controller
{


    public function show($id)
    {
        $sesssion = Sessions::where('id', $id)->first();

        $attachments = $sesssion->attachments;

        $sesssion['attachments']=$attachments;

        return response()->json($sesssion);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
         [
            'case_id' => 'required|integer|exists:cases,id',

            'number' => 'required',

            'date' => 'required|date',

            'description' => 'required|string',

        ],[

            
            'number.required' => 'يرجى إدخال  رقم الجلسة',

            'number.integer' => '0,1,.......,9 رقم الجلسة يجب أن يكون ضمن مجال',

            'date.required' => 'يرجى إدخال تاريخ الجلسة',

            'date.date' => ' تاريخ الجلسة يجب أن يكون تاريخ صحيح',

            'description.required' => 'يرجى إدخال التفاصيل الخاصة بالجلسة',

            'description.string' => 'التفاصيل يجب أن تكون نصية'
        ]);
    
        if ($validator->fails())
       {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        Sessions::create([

            'case_id' => $request->case_id,

            'number' => $request->number,

            'date' => $request->date,

            'description' => $request->description,
        ]);
        $id = Sessions::latest()->first()->id;

        if ($request->hasFile('atachments'))
         {
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

        if (!$session) 
        {
            return response()->json(['status' => 'error', 'message' => 'Session not found'], 404);
        }
      

        $validator = Validator::make($request->all(),
         [
            'case_id' => 'required|integer|exists:cases,id',

            'number' => 'required',

            'date' => 'required|date',

            'description' => 'required|string',

        ],[

            
            'number.required' => 'يرجى إدخال  رقم الجلسة',

            'number.integer' => '0,1,.......,9 رقم الجلسة يجب أن يكون ضمن مجال',

            'date.required' => 'يرجى إدخال تاريخ الجلسة',

            'date.date' => ' تاريخ الجلسة يجب أن يكون تاريخ صحيح',

            'description.required' => 'يرجى إدخال التفاصيل الخاصة بالجلسة',

            'description.string' => 'التفاصيل يجب أن تكون نصية'
        ]);
    
        if ($validator->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
    

        $session->update([

            'date' => $request->date,

            'description' => $request->description,

            'number' => $request->number,
        ]);

        return response()->json(['status' => 'success', 'message' => 'تم تحديث الجلسة بنجاح'], 200);

    }

    public function destroy(Request $request)
    {

        if (Sessions::find($request->id)->delete())
       {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'], 200);
        } 
        else 
        {
            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'], 500);
        }

    }
}
