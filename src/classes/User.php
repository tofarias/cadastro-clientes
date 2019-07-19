<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $primaryKey = 'id_user';
    protected $table = "user";
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [
       'name', 'email', 'password'
   ];

   /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */

   protected $hidden = [
       'password'
   ];

   public function isAdmin() : bool
   {
       return $this->is_admin;
   }

   public function isActive() : Bool
   {
       return $this->active;
   }

   public function client()
   {
       return $this->hasOne(\App\Client::class, 'id_user');
   }
 }