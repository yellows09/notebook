<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;
    protected $fillable = ['name','surname','patronymic','company','phone','email','date_of_birth','photo'];
}
