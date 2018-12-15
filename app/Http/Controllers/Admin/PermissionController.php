<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class PermissionController extends Controller
{
   function index_role()
   {
    $data = Role::all();
    return view('admin.permission.index_role',compact('data'));
   }

   function index_permission()
   {
    $data = Permission::paginate(10);
    return view('admin.permission.index_permission',compact('data'));
   }

   function store_role(Request $request)
   {
     Role::create(['name' => $request->role_name]);
     return back();
   }

   function store_permission(Request $request)
   {
    Permission::create(['name' => $request->permission_name]);
    return back();
   }

   function datatables()
   {
      $select = Permission::select('id','name','guard_name')->get();
      $data = Datatables::of($select)
          // ->rawColumns(['action','pilihan','pertanyaan'])
          ->addIndexColumn();

        return $data->make(true);
   }

   function show_role($id)
   { 
    $role = Role::find($id);
    $assigned = $role->permissions()->get();
    $permission = Permission::all();
    return view('admin.permission.assign',compact('role','permission','assigned'));
   }

   function role_assign(Request $request)
   {  
     $role = Role::findByName($request->role);
     $role->syncPermissions($request->permission);
     return back();
   }

   function user_assign_role_remove($id, Request $request)
   {  
      $role = Role::findByName($request->role);
      $permission = Permission::find($id);
      $role->revokePermissionTo($permission->name);
      return response()->json(["status"=>true],200);
   }

   function user_assign_role($user_id, $role)
   {  
      // $users = User::role($role)->get();
      // dd($users);
      $user = User::find($user_id);
      $user->assignRole($role);
      return back();
   }

}
