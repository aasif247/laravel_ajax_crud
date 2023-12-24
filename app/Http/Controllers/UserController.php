<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class UserController extends Controller
{

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'roles' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'role_id' => $request->input('roles'),
        ]);

        $user->save();

        return response()->json(['status' => 'success', 'message' => 'User created successfully'], 200);
    }


    public function editUser(User $user)
    {
        $roles = Roles::all(); // Assuming you have a Role model

        return response()->json([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required|string|max:255',
            'roles' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'role_id' => $request->input('roles'),
        ]);

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function datatable() {
        $query = User::query();

        return DataTables::eloquent($query)
            ->addColumn('action', function(User $user) {
                $btn =  '<a class="btn btn-light btn-sm btn-edit" role="button" data-id="'.$user->id.'">Edit</a>';
                $btn .= ' <a class="btn btn-dark btn-sm btn-delete" role="button" data-id="'.$user->id.'">Delete</a>';
                return $btn;
            })
            ->editColumn('role', function(User $user) {
                if ($user->role_id == 2)
                    return '<span class="badge badge-success">Admin</span>';
                elseif($user->role_id == 3)
                    return '<span class="badge badge-danger">Manager</span>';
                elseif($user->role_id == 4)
                    return '<span class="badge badge-info">Customer</span>';
            })
            ->rawColumns(['action','role'])
            ->toJson();
    }
}
