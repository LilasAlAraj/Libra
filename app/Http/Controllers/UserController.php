<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllLawyers()
    {
        $lawyers = User::select('first_name', 'last_name', 'id')->where('role_name', '=', 'lawyer')->get();
        return $lawyers;
    }public function getAllClientWithName(Request $request)
    {
        $clients = User::select('first_name', 'last_name', 'id')
            ->where('role_name', '=', 'client')
            ->where('first_name', '%', $request->name)
            ->orWhere('last_name', '%', $request->name)
            ->orWhere('father_name', '%', $request->name)
            ->get();
        return $clients;
    }
}
