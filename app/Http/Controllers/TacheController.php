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


class TacheController extends Controller
{
    // function qui renvoit le formulaire d'ajout d'une tache
    public function GETPAGEADDTACHE()
    {
        return view('tache.addtache');
    }
    // function de creation d'une tache 
    public function ADDTACHE(Request $request )
    {
        $request->validate([
            'nom'=>['required','max:15','min:5'],
            'duree'=>['required'],
        ]

        );
        $tache = Tache::create([
            'nom_taches'=>$request->nom,
            'duree_taches'=>$request->duree
        ]);
        session()->flash('notification.message',sprintf("Tache crée avec success"));
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDTACHE');
    }
     // function qui permet de lister tache
     public function GETLISTETACHE()
     {
             $listetache = Tache::all();
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
         $informationtache= Tache::where('id',$id)->get();
         return view('tache.update',[
             'informationtache'=>$informationtache,
             
         ]);  
             
     } 
     // function qui permet de mettre a jour une tache// 
     public function UPDATETACHE (Request $request,$id)

    {
            $tache= Tache::find($id);

            $request->validate([
                'nomupdate'=>['required'],
                'dureeupdate'=>['required'],

            ]);

            $tache->update([
                    'nom_taches'=>$request->nomupdate,
                    'duree_taches'=>$request->dureeupdate,
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
    }