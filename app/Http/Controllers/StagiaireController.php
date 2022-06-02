<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stagiaire;
use App\Models\Niveau;
use Illuminate\Support\Facades\DB;
class StagiaireController extends Controller
{
    // fonction qui revoit le formalire  d'ajout d'un stagiaire
    public function GETPAGEADDSTAGIAIRE() 
    {
        return view('stagiaire.addstagiaire');
    }

    /*** funtion qui retourne la liste des stagiares */

    public function GETLISTESTAGIARE()

    {
            $row = 1;
            $listetagiare = DB::table('users')
            ->join('stagiaires','users.id','=','stagiaires.user_id')
            ->join('niveaux','stagiaires.niveaux_id','=','niveaux.id')
            ->select(
                'users.matricule',
                'users.nom_user',
                'users.prenom_user',
                'users.date_de_naissance',
                'users.lieu_de_naissance',
                'users.telephone',
                'users.email',
                'niveaux.niveau'
            )
            ->orderBy('users.id','desc')
            ->paginate(15);

            return view('stagiaire.listestagaire',[
                'listetagiare'=>$listetagiare,
                'row'=>$row
            ]);
            
    }
}
