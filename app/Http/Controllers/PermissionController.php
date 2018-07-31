<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\PermissionRole;

class PermissionController extends Controller
{
   public function index()
   {
      $permissions = Permission::all();
      $no = 0;
      return view('permissions.index', compact('permissions', 'no'));
   }

   public function create()
   {
     //
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'label'              => 'required',
         'name_permission'    => 'required',
      ]);

      $permission = Permission::create([
         'label'           => $request->label,
         'name_permission' => $request->name_permission,
      ]);

      return back()->with('success', 'Permission added');
   }

   public function show($id)
   {
      $permission = Permission::find($id);
      $permissionRoles = PermissionRole::where('permission_id', $id)->get();

      return view('permissions.show', compact('permission', 'permissionRoles'));
   }

   public function edit($id)
   {
     //
   }


   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'label'              => 'required',
         'name_permission'    => 'required',
      ]);

      $permission = Permission::find($id);
      $permission->update([
         'label'           => $request->label,
         'name_permission' => $request->name_permission,
      ]);

      return back()->with('success', 'Permission updated');
   }

   public function destroy($id)
   {
      $permission = Permission::find($id);
      $permission->delete();

      return back()->with('success', 'Permission deleted');
   }
}
