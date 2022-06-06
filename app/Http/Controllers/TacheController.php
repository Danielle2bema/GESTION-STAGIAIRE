<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tache;
use App\Models\Encadreur;
use App\Models\Stagiaire;




class TacheController extends Controller
{
    // function qui renvoit le formulaire d'ajout d'une tache
    public function GETPAGEADDTACHE()
    {
        $allstagiare = DB::table('users')
        ->join('stagiaires','users.id','stagiaires.user_id')
        ->select('users.nom_user','users.prenom_user','stagiaires.id')
        ->orderBy('users.id','desc')
        ->get();

        return view('tache.addtache',[
            'allstagiare'=>$allstagiare
        ]);
    }
    // function de creation d'une tache 
    public function ADDTACHE(Request $request )
    {

        $encadreur = auth()->user()->id;

        $encadreurid = Encadreur::where('encadreurs.user_id',$encadreur);
        $id = $encadreurid->first();
        $idencadreur = $id->id;
        $request->validate([
            'nom'=>['required','max:515','min:5'],
            'datedebut'=>['required'],
            'datefin'=>['required'],
            'stagiaire'=>['required']

        ]

        );
        $tache = Tache::create([
            'nom_tache'=>$request->nom,
            'encadreur_id'=>$idencadreur,
            'stagiare_id'=>$request->stagiaire,
            'date_debut_tache'=>$request->datedebut,
            'date_fin_tache'=>$request->datefin
            
        ]);
        session()->flash('notification.message',sprintf("Tache crée avec success"));
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDTACHE');
    }
     // function qui permet de lister tache
     public function GETLISTETACHE()
     {
             $listetache = DB::table('users')
             ->join('stagiaires','users.id','=','stagiaires.user_id')
             ->join('taches','stagiaires.id','=','taches.stagiare_id')
             ->select('taches.*','users.nom_user','users.prenom_user')
             ->get();
             
             $nombre = 1;
             
             return view('tache.listetache',[
                 'listetache'=>$listetache,
                 'nombre'=>$nombre
             ]);
     }
     // function qui renvoit la page de modification d'une tache//
     public function GETPAGEUPDATETACHE()
     {
         $id = $_GET['id'];

         $allstagiare = DB::table('users')
         ->join('stagiaires','users.id','stagiaires.user_id')
         ->select('users.nom_user','users.prenom_user','stagiaires.id')
         ->orderBy('users.id','desc')
         ->get();
         $informationtache= Tache::where('id',$id)->get();
         return view('tache.update',[
             'informationtache'=>$informationtache,
             'allstagiare'=>$allstagiare
             
         ]);  
             
     } 
     // function qui permet de mettre a jour une tache// 
     public function UPDATETACHE (Request $request,$id)

    {
            $tache= Tache::find($id);
            $encadreur = auth()->user()->id;

            $encadreurid = Encadreur::where('encadreurs.user_id',$encadreur);
            $id = $encadreurid->first();
            $idencadreur = $id->id;

            $request->validate([
                'nomupdate'=>['required'],
                'datedebutupdate'=>['required'],
                'datefinupdate'=>['required'],
                'stagiaireupdate'=>['required'],


            ]);

            $tache->update([
                    'nom_tache'=>$request->nomupdate,
                    'date_debut_tache'=>$request->datedebutupdate,
                    'date_fin_tache'=>$request->datefinupdate,
                    'encadreur_id'=>$idencadreur,
                    'stagiare_id'=>$request->stagiaireupdate

            ]);
            session()->flash('notification.message',sprintf("tache modifié avec success"));
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTETACHE');
        }
        //** function qui permet de supprimer une tache */
        public function DELETETACHE(Request $request,$id)
        {
            $tachedelete = Tache::find($id);
            $tachedelete->delete();
            session()->flash('notification.message',sprintf("tache supprimée avec success"));
            session()->flash('notification.type','danger');
            
            return redirect()->route('GETLISTETACHE');
        }



        /*** funtion qui permet de lister les stages d'un stagiare */


        public function GETLISTEDTAGEBYID()
        {
            $idstagiaire = auth()->user()->id;
            $row = 1;
            $stagiaireid = Stagiaire::where('stagiaires.user_id',$idstagiaire);
            $id = $stagiaireid->first();
            $ids = $id->id;

            $datatache =  Tache::where('taches.stagiare_id',$ids)->get();

            return view('tache.mestaches',[
                'datatache'=>$datatache,
                'row'=>$row
            ]);

        }
    }