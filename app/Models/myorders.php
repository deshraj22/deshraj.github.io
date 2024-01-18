<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myorders extends Model
{
    use HasFactory;
    protected $table="myorders";
    protected $primarykey="id";
}
