<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{

    public function index(){
        return view('recommendations.view');
    }
    public function store(Request $request)
    {

        Recommendation::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $id = Recommendation::latest()->first()->id;
        return response()->json(['status' => 'success', 'message' => 'تم إضافة توصية جديدة بنجاح', 'id' => $id]);
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
        $recommendation = Recommendation::find($request->id);
        $recommendation->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json(['status' => 'success', 'message' => 'تم تعديل التوصية بنجاح']);
    }

    public function destroy(Request $request)
    {

        $id = $request->id;

        if (Recommendation::find($id)->delete()) {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح'],200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'حدث خطأ أثناء الحذف! أعد المحاولة'],500);
        }

    }
}
