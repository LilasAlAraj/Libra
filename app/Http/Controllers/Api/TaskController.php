<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getUserTasks()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $roleName = $user->role_name;
    
        if ($roleName === 'محامي') {
            $tasks = $user->tasks()->get();
            
            if ($tasks->isEmpty()) {
                return response()->json(['status' => 'success', 'message' => 'لا يوجد مهام حاليًا']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'يجب أن يكون لديك دور محامي لعرض المهام'], 400);
        }
    
        return response()->json(['status' => 'success', 'tasks' => $tasks]);
    }



}
