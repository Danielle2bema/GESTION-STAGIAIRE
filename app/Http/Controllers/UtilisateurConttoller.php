<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Encadreur;
use App\Models\Stagiaire;
use App\Models\Niveau;
use Illuminate\Support\Facades\DB;
class UtilisateurConttoller extends Controller
{
    //

    public function GETDAHSBOARD()
    {
        return view('dashboard');
    }

    public function GETPAGEHEADER()
    {
    
        return view('layout.header');
    }

    /*** function qui renvoie la page de creation d'un stagiare */

    public function GETPAGEADDUSER(){
        $getallniveau  =  Niveau::All();
  
        return view('user.adduser',['getallniveau'=>$getallniveau]);
    }

    /** function qui permet d'ajouter des users
     * 
     * @param [' encadreur'] : il peut etre un encadreur
     * @param ['stagiare']: il peut etre un stagiare
     */

     public function ADDUSER(Request $request)

     {
         $request->validate([
            'matricule'=>['required'],
            'nom'=>['required'],
            'prenom'=>['required'],
            'datenaissance'=>['required'],
            'lieunaissance'=>['required'],
            'telephone'=>['required'],
            'email'=>['required'],
            'role'=>['required'],
            'photo'=>['required'],
            'password'=>['required']

         ]);

         $createuser  = User::create([
                'matricule'=>$request->matricule,
                'nom_user'=>$request->nom,
                'prenom_user'=>$request->prenom,
                'date_de_naissance'=>$request->datenaissance,
                'lieu_de_naissance'=>$request->lieunaissance,
                'telephone'=>$request->telephone,
                'email'=>$request->email,
                'role'=>$request->role,
                'photo'=>$request->photo,
                'password'=>$request->password
                
         ]);

         if($createuser->role==='encadreur')
         {
             $encadreur = Encadreur::create([
                 'user_id'=>$createuser->id
             ]);

         } else {
            $stagiare = Stagiaire::create([
                'user_id'=>$createuser->id,
                'niveaux_id'=>$request->niveau
            ]);
         }

         session()->flash('notification.message',sprintf("Utilisateur crée avec success"));
         session()->flash('notification.type','success');
         return redirect()->route('GETPAGEADDUSER');
     }


     /**** function qui renvoie la page pour lister les utilisateurs */


     public   function GETALLUSER()
     {
            $row = 1;
            $alluser =  User::All();
            return view('user.listeuser',[
                'row'=>$row,
                'data'=>$alluser,
            ]);

           
     }

     /*** function qui renvoie la page de modification de l'utilisateur */

     public function GETPAGEUPDATEUSER()
     {
            $id =$_GET['id'];
            $getallniveau =  Niveau::All();
            $datauser =  User::where('id',$id)->get();
            return view('user.updateuser',[
                'datauser'=>$datauser,
                'getallniveau'=>$getallniveau
            ]);
     }


     /*** function qui permet de modifier un utilisateur */


     public  function UPDATEUSER(Request $request,$id)
     {
        
         $request->validate([
            'matriculeupdate'=>['required'],
            'nomupdate'=>['required'],
            'prenomupdate'=>['required'],
            'datenaissanceupdate'=>['required'],
            'lieunaissanceupdate'=>['required'],
            'telephoneupdate'=>['required'],
            'emailupdate'=>['required'],
            'roleupdate'=>['required'],
            'photoupdate'=>['required'],
            'passwordupdate'=>['required']

         ]);
         $userupdate = User::find($id);
         $userupdate->update([
                'matricule'=>$request->matriculeupdate,
                'nom_user'=>$request->nomupdate,
                'prenom_user'=>$request->prenomupdate,
                'date_de_naissance'=>$request->datenaissanceupdate,
                'lieu_de_naissance'=>$request->lieunaissanceupdate,
                'telephone'=>$request->telephoneupdate,
                'email'=>$request->emailupdate,
                'role'=>$request->roleupdate,
                'photo'=>$request->photoupdate,
                'password'=>$request->passwordupdate
                
         ]);

         if($userupdate->role==='stagiare')
         {
            
            $stagiareid = Stagiare::where('stagiaires.user_id',$userupdate);
            $stagiare->update([
                'niveaux_id'=>$request->niveauupdate
            ]);
         }

         session()->flash('notification.message',sprintf("Utilisateur modifié avec success"));
         session()->flash('notification.type','success');
         return redirect()->route('GETALLUSER');


     }


     /*** function qui permet de supprimer un utilisateur */

     public function DELETEUSER(Request $request,$id)
     
     {
            $userdelete =  User::find($id);
            $userdelete->delete();
            session()->flash('notification.message',sprintf("Utilisateur supprimé avec success"));
            session()->flash('notification.type','danger');
            return redirect()->route('GETALLUSER');
     }

   
    

}
