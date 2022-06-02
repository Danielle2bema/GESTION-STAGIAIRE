<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Etablissement;
use App\Models\Stage;

class EtablissementController  extends  Controller

{
    //function qui renvoie a la page de creation d'un etablissement
    public function GETPAGEADDETABLISSEMENT()
    {
        $listestage =  Stage::All();
        return view('etablissement.addetablissement',[
            'listestage'=>$listestage
            
        ]);
    }
   /** function qui permet de creer un etablissement */

   public function ADDETABLISSEMENT(Request $request)

   {
           $request->validate([

               'nom'=>['required'],
               'ville'=>['required'],
               'telephone'=>['required'],
               'fax'=>['required'],
               'email'=>['required'],
               'bp'=>['required'],
               'stage'=>['required']
           ]);

           $etablissement = Etablissement::create([
               'nom_etablissements'=>$request->nom,
               'ville'=>$request->ville,
               'telephone'=>$request->telephone,
               'fax'=>$request->fax,
               'email'=>$request->email,
               'bp'=>$request->bp,
               'stages_id'=>$request->stage
            
           ]);
           session()->flash('notification.message',sprintf("etablissement crée avec success"));
           session()->flash('notification.type','success');

           return redirect()->route('GETLISTEETABLISSEMENT');

   }
        // function qui permet de lister etablissement
        public function GETLISTEETABLISSEMENT()
        {
                $listetablissement = Etablissement::all();
                $nombre = 1;
                
                return view('etablissement.listeetablissement',[
                    'listetablissement'=>$listetablissement,
                    'nombre'=>$nombre
                ]);
        }
        // function qui renvoit la page de modification d'un etablissement//
        public function GETPAGEUPDATEETABLISSEMENT()
        {
            $id = $_GET['id'];
            $listestage =  Stage::all();
            $informationetablissement= Etablissement::where('id',$id)->get();
            return view('etablissement.updateetablissement',[
                'informationetablissement'=>$informationetablissement,
                'listestage'=>$listestage
                
            ]);  
                
        } 
        // function qui permet de mettre a jour un etablissement// 
        public function UPDATEETABLISSEMENT (Request $request,$id)
   
       {
               $etablissement= Etablissement::find($id);
   
               $request->validate([
                'nometablissementupdate'=>['required'],
               'villeupdate'=>['required'],
               'telephoneupdate'=>['required'],
               'faxupdate'=>['required'],
               'emailupdate'=>['required'],
               'bpupdate'=>['required'],
               'stages_idupdate'=>['required']
   
               ]); 
               $etablissement->update([
                       'nom_etablissements'=>$request->nometablissementupdate,
                       'ville'=>$request->villeupdate,
                       'telephone'=>$request->telephoneupdate,
                       'fax'=>$request->faxupdate,
                       'email'=>$request->emailupdate,
                       'bp'=>$request->bpupdate,
                       'stages_id'=>$request->stages_idupdate,
               ]);
               session()->flash('notification.message',sprintf("etablissement modifié avec success"));
               session()->flash('notification.type','success');
   
               return redirect()->route('GETLISTEETABLISSEMENT');
           }
           //** function qui permet de supprimer un etablissement */
           public function DELETEETABLISSEMENT(Request $request,$id)
           {
               $etablissementdelete = Etablissement::find($id);
               $etablissementdelete->delete();
               session()->flash('notification.message',sprintf("etablissement supprimée avec success"));
               session()->flash('notification.type','danger');
               
               return redirect()->route('GETLISTEETABLISSEMENT');
           }



}
