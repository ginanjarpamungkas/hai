<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermissionRole;

class PermissionRoleController extends Controller
{
   public function store(Request $request)
   {
      if ($request->permissions != null) {
         foreach ($request->permissions as $permission) {
            $permission = PermissionRole::create([
               'permission_id'   => $permission,
               'role_id'         => $request->role,
            ]);
         }
      }else {
         return back()->with('danger', 'Please select permission');
      }

      return back()->with('success', 'Permission setup');
   }

   public function destroy(Request $request)
   {
      if ($request->permissions != null) {
         foreach ($request->permissions as $permission) {
            $permissionRole = PermissionRole::find($permission);
            $permissionRole->delete();
         }
      }else {
         return back()->with('danger', 'Please select permission');
      }

      return back()->with('success', 'Permission deleted');
   }
}
