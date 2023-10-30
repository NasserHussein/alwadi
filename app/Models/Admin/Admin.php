<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['first_name','last_name','photo','phone_no','username','password','state'];



    protected $hidden = ['password','remember_token'];

}
