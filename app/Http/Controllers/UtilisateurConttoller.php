<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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

         $filename =time(). '.'.$request->photo->extension();
         $path = $request->file('photo')->storeAs(
             'avatars',
             $filename,
             'public'
         );


         $createuser  = User::create([
                'matricule'=>$request->matricule,
                'nom_user'=>$request->nom,
                'prenom_user'=>$request->prenom,
                'date_de_naissance'=>$request->datenaissance,
                'lieu_de_naissance'=>$request->lieunaissance,
                'telephone'=>$request->telephone,
                'email'=>$request->email,
                'role'=>$request->role,
                'photo'=>$path,
                'password'=>Hash::make($request->password)
                
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

         
    public function Authenticate(Request $request)
    {
            $request->validate([
                'email'=>['required'],
                'password'=>['required'],
            ]);

            if(auth()->attempt($request->only('email','password')))
             
                {
                        return redirect()->route('GETDAHSBOARD');
                }
               return redirect()->back()->WithErrors('Les identifiants ne correspondent pas');
    }   


        /*
            function de deconnexion
    */
    public function Logout()
    {
                Session::flush();
                Auth::logout();
                return redirect()->route('GOCONNECT');
    }
   
    public function GOCONNECT()
    {
        return view('welcome');
    }


    /*** function qui permet renvoie a la page pour modifier ces informations */

public function GETPAGEUPDATEMESINFORMATIONS()
{
        return view('user.updatemesinformation');
}


public function UPDATEMESINFORMATIONS(Request $request)
{
        $userid  = auth()->user()->id;
        $user = User::find($userid);

        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
            'photo'=>['required']
        ]);

        $filename =time(). '.'.$request->photo->extension();
        $path = $request->file('photo')->storeAs(
            'avatars',
            $filename,
            'public'
        );

        
        $user->update([
            'email'=>$request->email,
            'password'=>$request->password,
            'photo'=>$path

        ]);

        session()->flash('notification.message',sprintf("Vous avez modifié vos informations avec success"));
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEUPDATEMESINFORMATIONS');
}

    

}
