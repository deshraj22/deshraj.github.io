<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_cred extends Model
{
    protected $table="admincredentials";
    protected $primarykey="id";
    use HasFactory;
}
