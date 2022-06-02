<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
            'matricule',
            'nom_user',
            'prenom_user',
            'date_de_naissance',
            'lieu_de_naissance',
            'telephone',
            'email',
            'password',
            'role',
            'photo'
    ];
}
