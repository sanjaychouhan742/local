<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_User extends Model
{
	protected $table = 'app_users';
	protected $fillable = ['name','email','password','status'];	

	function company(){

		return $this->hasmany(company::class, 'users_id');
	}

	
}
