<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 一对一
    public function usersinfo()
    {
    	return $this->hasOne('App\Models\Usersinfo','uid');
    }
}
