<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /* public function index()
    {

    return view('courts.view');

    }*/

    public function clientsIndex()
    {
        return view('users.clients.view_clients');
    }public function clientIndex()
    {
        return view('users.clients.view_client');
    }
    public function membersIndex()
    {
        return view('users.members.view_members');
    }
    public function memberIndex()
    {
        return view('users.members.view_member');
    }

    public function membersCreate()
    {
        return view('users.members.add_member');

    }public function clientsCreate()
    {
        return view('users.clients.add_client');

    }

    public function store(Request $request)
    {

        $password = Hash::make($request->input('password'));

        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->mother_name = $request->input('mother_name');
        $user->father_name = $request->input('father_name');
        $user->phone = $request->input('phone');
        $user->place_of_birth = $request->input('place_of_birth');
        $user->current_address = $request->input('current_address');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->status = $request->input('status');
        $user->role_name = $request->input('role_name');
        $user->password = $password; // حفظ كلمة المرور المشفرة
        $user->save();
        return response()->json(['status' => 'success', 'message' => 'تم الإضافة بنجاح'], 200);
    }

    public function show($id)
    {

        if ($id == 'getclients') {
            $clients = User::where('role_name', '=', 'زبون')->get();
            return response()->json(['clients' => $clients]);

        } else if ($id == 'getmembers') {
            $members = User::where('role_name', '=', 'محامي')->orWhere('role_name', '=', 'سكرتاريا')
                ->get();
            return response()->json(['members' => $members]);

        } else {

            $user = User::find($id);
            return response()->json($user);
        }
    }

    public function editClient()
    {
        return view('users.clients.edit_client');
    }

    public function editMember()
    {
        return view('users.members.edit_member');
    }

    public function update(Request $request)
    {

        // $this->validate($request, [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'mother_name' => 'required',
        //     'father_name' => 'required',
        //     'phone' => 'required',
        //     'location' => 'required',
        //     // 'email' => 'required|email|unique:users,email',

        //     'roles_name' => 'required',
        // ]);
        $input = $request->all();

        $user = User::find($input['id']);
        $user->update($input);
        return response()->json(['status' => 'success', 'message' => 'تم التعديل بنجاح'], 200);
    }

    public function getAllLawyers()
    {
        $lawyers = User::select('first_name', 'last_name', 'id')->where('role_name', '=', 'محامي')->get();
        return response()->json(['lawyers' => $lawyers]);

    }public function getAllClientWithName(Request $request)
    {
        $clients = User::select('first_name', 'father_name', 'last_name', 'id')
            ->where('role_name', '=', "زبون")
            ->where('first_name', 'like', "$request->name%")
            ->orWhere('last_name', 'like', "$request->name%")
            ->orWhere('father_name', 'like', "$request->name%")
            ->get();
        return response()->json(['clients' => $clients]);
    }

    public function update_account_status(Request $request)
    {
        $userId = $request->id;
        $user = User::find($userId);

        if ($user) {

            if ($user->status === 'مفعل') {
                $user->update([
                    'status' => 'غير مفعل',
                ]);
                return response()->json(['status' => 'success', 'message' => 'تم تغيير حالة الحساب بنجاح']);

            } elseif ($user->status === 'غير مفعل') {
                $user->update([
                    'status' => 'مفعل',
                ]);
                return response()->json(['status' => 'success', 'message' => 'تم تغيير حالة الحساب بنجاح']);

            }

        }
    }
    public function destroy($id)
    {
        if (User::find($id)->forceDelete()) {
            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'لم يتم الحذف ']);
        }

    }

    public function roleName()
    {

        $roleName = Auth::user()->role_name;
        $roleID = 0;
        if ($roleName === 'مدير') {
            $roleID = 1;
        } else if ($roleName === 'سكرتاريا') {
            $roleID = 2;
        } else if ($roleName === 'محامي') {
            $roleID = 3;
        } else if ($roleName === 'زبون') {
            $roleID = 4;
        }

        return response()->json(['rold' => $roleID]);
    }





    public function clientCount(){
        $num_clients = User::where('role_name', '=', 'زبون')->count();

         return response()->json(['num_clients'=>$num_clients]);
    }

}
