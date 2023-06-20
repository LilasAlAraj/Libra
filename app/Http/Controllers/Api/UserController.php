<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserCases()
    {
        
        $userId = Auth::id();
        $user = Auth::user();
        $roleName = $user->role_name; 
    
        if ($roleName === 'محامي') {
            $cases = $user->lawyer_cases()->with('lawyers', 'clients')->get();
        } elseif ($roleName === 'زبون') {
            $cases = $user->client_cases()->with('lawyers', 'clients')->get();
        } else {
            return response()->json(['status' => 'error', 'message' => 'تأكد من دور المستخدم'], 400);
        }
    
        return response()->json(['status' => 'success', 'cases' => $cases]);
    }
}
