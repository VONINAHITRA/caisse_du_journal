<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $guarded=[];
    protected $primarykey = "id";
    public $table = 'operations';
}
