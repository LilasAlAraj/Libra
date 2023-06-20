<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cases;
use Illuminate\validation;
use App\Http\Resources\CaseResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class CaseController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        // returns all the cases
        $cases = CaseResource::collection(Cases::get());
        return $this->apiResponse($cases ,'ok',200);
        
    }

    public function show($id){
        //returns only one case 
        $case = Cases::find($id);
        
        if($case){
        return $this->apiResponse(new CaseResource($case) ,'ok',200);
        }
        return $this->apiResponse(null ,'this case not found',404);
    }
}
