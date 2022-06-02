<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
            'stagiare_id',
            'encadreur_id',
            'domaine_id',
            'theme',
            'date_debut_stage',
            'date_fin_stage'
    ];
}
