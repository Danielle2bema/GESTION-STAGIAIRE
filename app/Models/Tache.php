<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable =[
        'stagiare_id',
        'encadreur_id',
        'nom_tache',
        'date_debut_tache',
        'date_fin_tache',
        'statut_tache'

    ];
}
