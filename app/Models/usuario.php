<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
  protected $table = 'usuarios';
    protected $hidden=["created_at","updated_at"];
}
