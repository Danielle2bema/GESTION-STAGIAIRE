<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Encadreur;
use App\Models\Stagiaire;
use App\Models\Tache;
use App\Models\Note;

class NoteController extends Controller
{
    //function qui renvoir le formulaire d'ajout d'une note
    public function GETPAGEADDNOTES()
    {
        $row = 1;

        $informationsStagiaire = DB::table('users')
        ->join('stagiaires','users.id','=','stagiaires.user_id')
        ->join('taches','stagiaires.id','=','taches.stagiare_id')
        ->select('stagiaires.id','taches.nom_tache','users.nom_user','users.prenom_user')
        ->where('taches.statut_tache',0)
        ->orderBy('taches.id','desc')
        ->get();


        $tache = DB::table('users')
    
        ->join('stagiaires','users.id','=','stagiaires.user_id')
        ->join('taches','stagiaires.id','=','taches.stagiare_id')
        ->select('taches.id')
        ->where('taches.statut_tache',0)

        ->orderBy('taches.id','desc')

        ->get();

      //  die($tache);
       // die($informationsStagiaire);

        return view('note.addnote',[
            'informationsStagiaire'=>$informationsStagiaire,
            'tache'=>$tache,
            'row'=>$row
        ]);
              
    }


    /*** function qui permet de donner une note */


    public function ADDNOTE(Request $request,$idtache,$idstagiaire)
    {
                $request->validate([
                    'note'=>['required'],
                    'commentaire'=>['required']
                ]);


                $encadreur = auth()->user()->id;
                $encadreurid = Encadreur::where('encadreurs.user_id',$encadreur)->get();
                $ids = $encadreurid->first();
                $idencadreur = $ids->id;
                $note =  Note::create(
                    [
                        'tache_id'=>$idtache,
                        'stagiare_id'=>$idstagiaire,
                        'encadreur_id'=>$idencadreur,
                        'note_tache'=>$request->note,
                        'commentaire_tache'=>$request->commentaire

                    ]
                    );


                    $tache = Tache::find($idtache);
                    $tache->update([
                        'statut_tache'=>1
                    ]);

                    session()->flash('notification.message',sprintf("Note attribuée avec success"));
                    session()->flash('notification.type','success');
                    return redirect()->route('GETPAGEADDNOTES');
    }



    public function  GETPAGEVOIRNOTE()
    {
        $idtache = $_GET['id'];
        $tache =  Note::where('notes.tache_id',$idtache)->get();
        return view('note.voirnote',[
            'tache'=>$tache   
        ]);
    }


    public function GETPAGEIMPRIMERCARTE()
    {
        $id = $_GET['id'];


        $information  = DB::table('users')
        ->join('stagiaires','users.id','=','stagiaires.user_id')
        ->join('stages','stagiaires.id','stages.stagiare_id')
        ->select('users.*','stages.*')
        ->get();

       // die($information);

        return view('stagiaIre.imprimer',[
            'information'=>$information
        ]);
    }

    /*** function qui permet a l'encadreur de voir la  note affecte a un etudiant sur une tache*/


    public function GETPAGESEENOTEBYTACHEID()

    {
        $id = $_GET['id'];

        $note = Note::where('notes.tache_id',$id)->get();
      //  die($note);
        return view('note.voirnoteetudiant',[
            'note'=>$note
        ]);

    }




}
