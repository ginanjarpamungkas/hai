<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
   protected $guarded = ['id'];

   protected $with = ['permission', 'role'];

   public function permission()
   {
      return $this->belongsTo(Permission::class);
   }

   public function role()
   {
      return $this->belongsTo(Role::class);
   }
}
