<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $guarded = ['id'];

   protected $with = ['users'];

   public function users()
   {
      return $this->hasMany(User::class);
   }

   public function permissionRoles()
   {
      return $this->hasMany(PermissionRole::class);
   }
}
