<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
     protected $table = 'company';
     protected $fillable = ['name','users_id'];
     function user(){

		return $this->belongsto(App_User::class,'users_id');
	}
}
