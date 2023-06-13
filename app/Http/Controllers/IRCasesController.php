<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;

class IRCasesController extends Controller
{

    public function index()
    {

        // $this->destroyIndex();
        // $this->createIndex();
        // $this->indexAll();
        return view('cases.retreive_cases');
    }

    public function createIndex()
    {
        Cases::createIndex();
    }

    public function destroyIndex()
    {
        Cases::destroyIndex();

    }

    public function indexAll()
    {
        Cases::indexAll();

    }

    public function search(Request $requset)
    {

        // $i = 0;
        // $casesArray = [];
        $query = $requset->toSearch;

        $cases = Cases::search($query);

        return response()->json(['cases' => $cases]);
    }

    

}
