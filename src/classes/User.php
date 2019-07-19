<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent

{

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
       'password', 'remember_token'
   ];

   /*
   * Get Todo of User
   *
   */

   public function todo()

   {
       return $this->hasMany('Todo');

   }

 }