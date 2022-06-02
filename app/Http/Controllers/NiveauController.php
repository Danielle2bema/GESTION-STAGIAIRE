<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Niveau;

class NiveauController extends Controller
{
    //function qui renvoit le formulaire d'ajout d'un niveau 
    public function GETPAGEADDNIVEAU()
    {
        return view('niveau.addniveau');
    }
    // function qui permet de creer un niveau 
    public function ADDNIVEAU(Request $request )
    {
        $request->validate([
            'niveau'=>['required'],
        ]
        );

        $niveau = Niveau::create([
            'niveau'=>$request->niveau,
        ]);
        session()->flash('notification.message',sprintf("niveau crée avec success"));
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDNIVEAU');
    }
    //function qui renvoit la liste des niveaux 
    public function GETLISTENIVEAU()
    {
            $listeniveau = Niveau::all();
            $nombre = 1;
            
            return view('niveau.listeniveau',[
                'listeniveau'=>$listeniveau,
                'nombre'=>$nombre
            ]);
      }
          /** function qui renvoie la page de modification d'un niveau */

    public function GETPAGEUPDATENIVEAU()

    {
        $id = $_GET['id'];
        $informationniveau =  Niveau::where('id',$id)->get();   
        return view('niveau.updateniveau',[
            'informationniveau'=>$informationniveau
        ]
    
    );
    }
     // function qui permet de mettre a jour un nivequ// 
     public function UPDATENIVEAU (Request $request,$id)

    {
            $niveau= Niveau::find($id);

            $request->validate([
                'niveauupdate'=>['required'],

            ]);

            $niveau->update([
                    'niveau'=>$request->niveauupdate,

            ]);
            session()->flash('notification.message',sprintf("niveau modifié avec success"));
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTENIVEAU');
 
        }
         //** function qui permet de supprimer un niveau  */
         public function DELETENIVEAU(Request $request,$id)
         {
             $niveaudelete = Niveau::find($id);
             $niveaudelete->delete();
             session()->flash('notification.message',sprintf("niveau supprimé avec success"));
             session()->flash('notification.type','danger');
             
             return redirect()->route('GETLISTENIVEAU');
         }
}