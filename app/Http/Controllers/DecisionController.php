<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{

    public function show($id)
    {
        $decision = Decision::where('id', $id)->first();
        
        return response()->json($decision);

    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), 
        [
            'number' => 'required|string',

            'date' => 'required|date',

            'description' => 'required|string',

            'case_id' => 'required|integer|exists:cases,id',
        ]);
    
        if ($validator->fails()) 
        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
    
        $decision = Decision::find($request->id);
    
        if (!$decision)
       {
            return response()->json(['status' => 'error', 'message' => 'Decision not found'], 404);
        }

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

        $validator = Validator::make($request->all(), 
        [
        'date' => 'required|date',

        'description' => 'required|string',

        'number' => 'required|string',
       ]);

    if ($validator->fails()) 

    {
        return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
    }

    $decision = Decision::find($id);

    if (!$decision)

    {
        return response()->json(['status' => 'error', 'message' => 'Decision not found'], 404);
    }

        $decision->update
        ([

            'date' => $request->date,

            'description' => $request->description,

            'number' => $request->number,
        ]);

        $decision->updateIndex();

        return response()->json(['status' => 'success', 'message' => 'تم تعديل القرار بنجاح', 'case_id' => $decision->case->id]);
    }

    public function destroy(Request $request)
    {

        $id = $request->id;

        $decision = Decision::find($id);

        if ($decision->deleteIndex() && $decision->delete())
        {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'], 500);
        }

    }

}
