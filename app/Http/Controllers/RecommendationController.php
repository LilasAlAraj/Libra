<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{

    public function index()
    {
        return view('recommendations.view');
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),

       [
            'title' => 'required|string',

            'content' => 'required|string',
        ],
        [

            'title.required' => 'يرجى إدخال عنوان التوصية',

            'content.required' => 'يرجى إدخال المحتوى الخاص بالتوصية',


        ]);

        if ($validator->fails())

        {
            return response()->json(['status' => 'failed', 'message' => $validator->errors()]);
        }

        Recommendation::create
        ([

            'title' => $request->title,

            'content' => $request->content,
        ]);

        $id = Recommendation::latest()->first()->id;

        return response()->json(['status' => 'success', 'message' => 'تم إنشاء التوصية بنجاح','id'=>$id], 200);
    }

    public function all()
    {
        $recommendations = Recommendation::all();

        return response()->json(['recommendations' => $recommendations]);

    }

    public function show($id)
    {
        $recommendation = Recommendation::where('id', $id)->first();

        return response()->json($recommendation);

    }

    public function update(Request $request)

    {
        $validator = Validator::make($request->all(),

        [
            'id' => 'required|exists:recommendations',

            'title' => 'required|string',

            'content' => 'required|string',

        ],[

            'title.required' => 'يرجى إدخال العنوان',

            'title.string' => 'العنوان يجب أن يكون سلسلة نصية',

            'content.required' => 'يرجى إدخال المحتوى الخاص بالتوصية',

            'content.string' => 'المحتوى يجب أن تكون نصية'

        ]);

        if ($validator->fails())

        {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        $recommendation = Recommendation::find($request->id);

        $recommendation->update

        ([

            'title' => $request->title,

            'content' => $request->content,
        ]);

        return response()->json(['status' => 'success', 'message' => 'تم تحديث التوصية بنجاح'], 200);
    }

    public function destroy(Request $request)

    {

        $id = $request->id;

        if (Recommendation::find($id)->delete())
        {

            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'],200);

        }
        else
        {

            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'],500);
        }

    }
}
