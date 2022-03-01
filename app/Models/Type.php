<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{ 
    protected $primarykey = "id";
    public $table = 'types';
    
    protected $fillable = [
        'typeOperation', 
        'description',
    ];

}
