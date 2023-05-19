<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

    return view('courts.view');

    }

    public function create()
   {
      return view('users.create');
    
    }
    
        
  public function store(Request $request)

  {

    $this->validate($request, [
    'first_name' => 'required',
    'last_name' => 'required',
    'mother_name' => 'required',
    'father_name' => 'required',
    'phone' => 'required',
    'location'=>'required',
    // 'email' => 'required|email|unique:users,email',
    'password' => 'required|same:confirm-password',
    'roles_name' => 'required'
     ]);
    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $user = User::create($input);
    return response()->json(['status' => 'success'], 200);
   }

   public function show($id)
   {
   $user = User::find($id);
    return response()->json($user);
   }

    public function edit($id)
    {
        $user = User::find($id);
       return view('users.edit',compact('user'));
    }
    

 
   public function update(Request $request, $id)
 
   { 

    $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'mother_name' => 'required',
        'father_name' => 'required',
        'phone' => 'required',
        'location'=>'required',
        // 'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles_name' => 'required'
        ]);
    $input = $request->all();
    if(!empty($input['password']))
       {
         $input['password'] = Hash::make($input['password']);
        }
    else
    {
        $input = array_except($input,array('password'));
    }
    $user = User::find($id);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));
    return redirect()->route('users.index');
    return response()->json(['status' => 'success'], 200);
   }

    public function getAllLawyers()
      {
        $lawyers = User::select('first_name', 'last_name', 'id')->where('role_name', '=', 'lawyer')->get();
        return response()->json(['lawyers'=>$lawyers]);

    }public function getAllClientWithName(Request $request)
    {
        $clients =User:: select('first_name', 'father_name','last_name', 'id')
           ->where('role_name', '=', "client")
            ->where('first_name', 'like', "$request->name%")
            ->orWhere('last_name', 'like', "$request->name%")
            ->orWhere('father_name', 'like', "$request->name%")
            ->get();
        return response()->json(['clients'=>$clients]);
    }
}
