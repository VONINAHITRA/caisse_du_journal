<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    protected $primarykey = "idMouvement";
    public $table = 'mouvements';
    protected $fillable = [
        'typeMouvement', 
        'dateMouvement',
        'commentMouvement', 
        'quantiteMouvement', 
        'billetMouvement',
        'pieceMouvement',
        'centimeMouvement',
        'totalMouvementDepot',
        'totalMouvementRemise',
        'totalMouvementRetrait',
    ];
}
