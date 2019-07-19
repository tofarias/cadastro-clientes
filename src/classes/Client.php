<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
    protected $primaryKey = 'id_client';
    protected $table = "client";
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
  public function user()
  {
      return $this->belongsTo(User::class, 'id_user');
  }

 }