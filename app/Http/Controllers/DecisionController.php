<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{

    // public function index()
    // {

    //     $desicion = Decision::all();

    //     return view('Decision.desicion.index', compact('desicion'));

    // }

    public function show($id)
    {
        $decision = Decision::where('id', $id)->first();
        return response()->json($decision);

    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'number' => 'required',
        //     'date' => 'required',
        //     'description'=>'required',
        //     'case_id'=>'required',
        // ],[

        // 'date.required'=>'please fill the desicion date',
        // 'description.required'=>'please fill the description',
        // 'number.required'=>'please fill the number',

        // ]);
        $decision = new Decision;
        $decision->number = $request->number;
        $decision->date = $request->date;
        $decision->description = $request->description;
        $decision->case_id = $request->case_id;
        $decision->save();
        $decision->index();

        return response()->json(['status' => 'success', 'message' => 'تم إضافة قرار جديد بنجاح', 'id' => $decision->id]);

    }
    public function update(Request $request)
    {

        $id = $request->id;

        $this->validate($request, [
            'date' => 'required',
            'description' => 'required',
            'number' => 'required',
        ], [

            'date.required' => 'please fill the desicion date',
            'description.required' => 'please fill the description',
            'number.required' => 'please fill the number',
            'delay_reasons.required' => 'please fill the delay_reasons',

        ]);
        $desicion = Decision::find($id);

        $desicion->update([
            'date' => $request->date,
            'description' => $request->description,
            'number' => $request->number,
        ]);
        $desicion->updateIndex();

        return response()->json(['status' => 'success', 'message' => 'تم تعديل القرار بنجاح', 'case_id' => $desicion->case->id]);
    }

    public function destroy(Request $request)
    {

        $id = $request->id;
        $desicion = Decision::find($id);
        if ($desicion->deleteIndex() && $desicion->delete()) {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'], 500);
        }

    }

}
