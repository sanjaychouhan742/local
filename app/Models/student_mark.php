<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_mark extends Model
{
    use HasFactory;
    protected $fillable = ['rollnumber','marks'];
}
