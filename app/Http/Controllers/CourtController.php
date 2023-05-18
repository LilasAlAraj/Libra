<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Courts;
use Illuminate\Http\Request;

class CourtController extends Controller
{

    public function index()
    {
        return view('courts.view');
    }
    public function show()
    {
        $court = Courts::all();
        return response()->json($court);
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $b_exit = Courts::where('name', '=', $input['name'])->where('place', '=', $input['place'])->exists();

        if ($b_exit) {
            session()->flash('Erorr', 'Error the Court already exist');

            return response()->json(['status' => 'failed', 'message' => 'هذه القضية مضافة مسبقاً']);
        } else {

            $sections = new Courts();

            $sections->name = $request->name;

            $sections->place = $request->place;

            $sections->save();

            session()->flash('Add', 'The Courts Is Added');

            return response()->json(['status' => 'success'], 200);
        }
    }

    public function update(Request $request)
    {

        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|unique:Courts,name|max:255', '.$id',

            'description' => 'required',

        ], [

            'name.required' => 'please fill the court name',

            'name.unique' => 'the name exist already',

            'place.required' => 'please fill the place',

        ]);

        $sections = Courts::find($id);

        $sections->update([

            'name' => $request->name,

            'description' => $request->description,

        ]);

        session()->flash('edit', 'the section is edited sucessfully');
        return redirect('/sections');

    }

    public function destroy(Request $request)
    {

        $MyCases_id = Cases::where('court_id', $request->id)->pluck('court_id');

        if ($MyCases_id->count() == 0) {

            $courts = Courts::findOrFail($request->id)->delete();

            return redirect()->route('courts.index');
        } else {

            return redirect()->route('courts.index');

        }

    }

}
