<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{

   public function index()
   {
      $users = User::all();
      $no = 0;
      return view('users/index', compact('users', 'no'));

   }

   public function create()
   {
     //
   }

   public function store(Request $request)
   {

   }

   public function show($id)
   {
      $user = User::find($id);
      $roles = Role::all();

      return view('users.show', compact('user', 'roles'));
   }

   public function edit($id)
   {
     //
   }

   public function update(Request $request, $id)
   {
      // dd($id);
      $this->validate($request, [
         'name'      => 'required',
         'email'     => 'required',
         'role_id'   => 'required',
      ]);

      $user = User::find($id);
      $user->update([
         'name'      => $request->name,
         'email'     => $request->email,
         'role_id'   => $request->role_id,
      ]);

      return back()->with('success', 'user Updated');
   }

   public function destroy($id)
   {
     //
   }
}
