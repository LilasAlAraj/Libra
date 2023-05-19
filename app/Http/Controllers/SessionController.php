<?php

namespace App\Http\Controllers;

use App\Models\Sessions;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        $session = Sessions::where('case_id','=',$request->case_id)->get();

        return response()->json(['status' => 'success', 'sessions' => $session], 200);
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

        return response()->json(['status' => 'success', 'message' => 'تم إضافة الجلسة بنجاح'], 200);

    }

    public function update(Request $request)
    {

        $id = $request->id;

        $sections = Sessions::find($id);

        $sections->update([

            'date' => $request->date,

            'description' => $request->description,

            'delay_date' => $request->delay_date,

            'delay_reasons' => $request->delay_reasons,

        ]);

        session()->flash('edit', 'تم نعديل الجلسة بنجاح');

        return redirect('/sections');

    }

    public function destroy(Request $request)
    {

        $id = $request->id;

        Sessions::find($id)->delete();

        session()->flash('delete', 'You delete the Sessions');

        return redirect('/Sessions');

    }
}
