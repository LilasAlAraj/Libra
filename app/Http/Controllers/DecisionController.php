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

            'description' => 'required|string',

            'date' => 'required|date',
        ],
         [
            'number.required' => 'يرجى إدخال رقم القرار',

            'number.string' => 'يجب أن يكون رقم القرار سلسلة نصية',

            'date.required' => 'يرجى إدخال تاريخ القرار',

            'date.date' => 'يجب أن يكون تاريخ القرار صالحًا',

            'description.required' => 'يرجى إدخال التفاصيل الخاص بالقرار',

            'description.string' => 'التفاصيل يجب أن تكون نصية'

        ]);
    
        $validator->after(function ($validator) use ($request)
        
        {
            $exists = Decision::where('number', $request->number)

                ->where('date', $request->date)

                ->first();
    
            if ($exists) 

            {
                $validator->errors()->add('number', 'رقم القرار وتاريخه مسجل بالفعل');
            }

        });
    
        if ($validator->fails()) 

        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
    
        return response()->json(['status' => 'success', 'message' => 'تم التحقق من صحة رقم القرار وتاريخه'], 200);
    

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

        $decision = Decision::find($id);

        if (!$decision)
    
        {
            return response()->json(['status' => 'error', 'message' => 'القرار غير موجود !'], 404);
        }

        $validator = Validator::make($request->all(),
        
        [
            'number' => 'required|string',

            'description' => 'required|string',

            'date' => 'required|date',
        ],
         [
            'number.required' => 'يرجى إدخال رقم القرار',

            'number.string' => 'يجب أن يكون رقم القرار سلسلة نصية',

            'date.required' => 'يرجى إدخال تاريخ القرار',

            'date.date' => 'يجب أن يكون تاريخ القرار صالحًا',

            'description.required' => 'يرجى إدخال التفاصيل الخاص بالقرار',

            'description.string' => 'التفاصيل يجب أن تكون نصية'

        ]);
    
        $validator->after(function ($validator) use ($request, $id)

         {
            $exists = Decision::where('number', $request->number)

                ->where('date', $request->date)

                ->where('id', '!=', $id)

                ->first();
    
            if ($exists)

            {
                $validator->errors()->add('number', ' رقم القرار وتاريخه مسجل بالفعل');
            }
        });
    
        if ($validator->fails()) 

        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
    
        return response()->json(['status' => 'success', 'message' => 'تم التحقق من صحة رقم القرار وتاريخه'], 200);

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
