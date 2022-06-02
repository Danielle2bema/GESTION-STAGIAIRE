<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Stage;
use App\Models\Encadreur;
use App\Models\Stagiaire;
use App\Models\Domaine;
use App\Models\StageStagiare;





class StageController extends Controller
{
    // function qui renvoie a la page de creation d'un stage
    public function GETPAGEADDSTAGE()
    {
        $allencadreur = DB::table('users')
        ->join('encadreurs','users.id','=','encadreurs.user_id')
        ->select('encadreurs.id','users.nom_user')
        ->orderBy('id','desc')
        ->get();

        $allstagiare = DB::table('users')
        ->join('stagiaires','users.id','=','stagiaires.user_id')
        ->select('stagiaires.id','users.nom_user','users.prenom_user')
        ->orderBy('id','desc')
        ->get();
        
        $alldomaine = DB::table('domaines')
        ->orderBy('id','desc')
        ->get();

        return view('stage.addstage',[
            'allencadreur'=>$allencadreur,
            'allstagiare'=>$allstagiare,
            'alldomaine'=>$alldomaine
        ]);
    }

    /** function qui permet de creer un stage */

    public function ADDSTAGE(Request $request)

    {
            $request->validate([

               
                'nom_stagiaire'=>['required'],
                'nom_encadreur'=>['required'],
                'nom_domaine'=>['required'],
                'datedebut'=>['required'],
                'datefin'=>['required'],
                'theme'=>['required'],
            ]);

            $stage = Stage::create([
                'stagiare_id'=>$request->nom_stagiaire,
                'encadreur_id'=>$request->nom_encadreur,
                'domaine_id'=>$request->nom_domaine,
                'date_debut_stage'=>$request->datedebut,
                'date_fin_stage'=>$request->datefin,
                'theme'=>$request->theme,
            ]);

            $stagiairestage = StageStagiare::create([
                    'stage_id'=>$stage->id,
                    'stagiaires_id'=>$request->nom_stagiaire
            ]);
            session()->flash('notification.message',sprintf("Stage crée avec success"));
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTESTAGE');

    }

    /** function qui renvoie la liste des stages */


    public function GETLISTESTAGE()
    {
            $listestage = Stage::all();
            $nombre = 1;
            
            return view('stage.listestage',[
                'listestage'=>$listestage,
                'nombre'=>$nombre
            ]);
    }

    /** function qui renvoie la page de modification d'un stage */

    public function GETPAGEUPDATESTAGE()

    {
        $id = $_GET['id'];
        $alldomaine = DB::table('domaines')
        ->orderBy('id','desc')
        ->get();
        $informationstage =  Stage::where('id',$id)->get();

        return view('stage.update',[
            'informationstage'=>$informationstage,
            'alldomaine'=>$alldomaine
        ]
    
    );
    }

    /**  function qui permet de mettre a jour un stage */
    
    public   function UPDATESTAGE(Request $request,$id)

    {
            $stage= Stage::find($id);

            $request->validate([
                'nom_domaineupdate'=>['required'],
                'datedebutupdate'=>['required'],
                'datefinupdate'=>['required'],
                'themeupdate'=>['required'],

            ]);

            $stage->update([
                    'domaine_id'=>$request->nom_domaineupdate,
                    'date_debut'=>$request->datedebutupdate,
                    'date_fin'=>$request->datefinupdate,
                    'theme'=>$request->themeupdate,
                    'rapport'=>$request->rapportupdate
            ]);
            session()->flash('notification.message',sprintf("Stage modifié avec success"));
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTESTAGE');

    }
    // function qui permet de supprimer un stage

    public function DELETESTAGE(Request $request,$id)
    {
        $stagedelete = Stage::find($id);
        $stagedelete->delete();
        session()->flash('notification.message',sprintf("Stage supprimé avec success"));
        session()->flash('notification.type','danger');
        return redirect()->route('GETLISTESTAGE');


    }

    public function GETLISTESTAGIAIREBYID(){
        $idstage= $_GET['id'];
        $row=1;
        $information = DB::table('users')
        ->join('stagiaires','users.id','=','stagiaires.user_id')
        ->join('stages','stagiaires.id','=','stages.stagiare_id')
        ->select(
            'stagiaires.id',
            'users.nom_user',
            'users.prenom_user',
            'users.telephone',
            'users.email',
        
        
        )
        ->where('stages.id',$idstage)
        ->get();

        return view('stage.listestagiaire',[
            'row'=>$row,
            'information'=>$information
        ]);
    }
}