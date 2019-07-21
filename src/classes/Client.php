<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
    protected $primaryKey = 'id_client';
    protected $table = "client";

    protected $fillable = [
          'name', 'email', 'password', 'key', 'phone', 'nr_matricula', 'nr_turma', 'cpf_cnpj'
     ];

     public function user()
     {
          return $this->belongsTo(\App\User::class, 'id_user');
     }
 }