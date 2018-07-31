<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\PermissionRole;

class RoleController extends Controller
{

   public function index()
   {
      $roles = Role::all();
      $no = 0;

      return view('roles.index', compact('roles', 'no'));
   }

   public function create()
   {
     //
   }

   public function store(Request $request)
   {
      $this->validate($request,[
         'name' => 'required'
      ]);

      $role = Role::create([
         'name' => $request->name
      ]);

      return back()->with('success', 'Role added');
   }

   public function show($id)
   {
      $role = Role::find($id);
      $permissions = Permission::whereDoesntHave('permissionRoles', function($query) use ($id) {
                                      $query->where('role_id', '=', $id);
                                  })->get();
      $permissionRoles = PermissionRole::where('role_id', $id)->get();

      return view('roles.show', compact('role', 'permissions', 'permissionRoles'));
   }

   public function edit($id)
   {
     //
   }

   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'name' => 'required',
      ]);

      $role = Role::find($id);
      $role->update([
         'name' => $request->name,
      ]);

      return back()->with('success', 'Role updated');

   }

   public function destroy($id)
   {
      $role = Role::find($id);
      $role->delete();

      return back()->with('success', 'Role deleted');
   }
}
