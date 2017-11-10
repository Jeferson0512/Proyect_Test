<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
  protected $table = 'medicos';
  //protected $hidden = ["created_at","updated_at"];
  public $timestamp = false;
}
