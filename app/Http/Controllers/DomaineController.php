<?php

namespace App\Http\Controllers;
use App\Models\Domaine;

use Illuminate\Http\Request;

class DomaineController extends Controller
{
    //

    public function GETPAGEADDOMAINE()

    {
            return view('domaine.adddomaine');
    }

    /*** function qui permet de creer un domaine */

    public function ADDDOMAINE(Request $request)
    {
        $request->validate([
                'nom_domaine'=>['required'],
                'commentaire_domaine'=>['required']
        ]);

        $domaine = Domaine::create([
                'nom_domaines'=>$request->nom_domaine,
                'commentaire_domaine'=>$request->commentaire_domaine
        ]);

        session()->flash('notification.message',sprintf("Domaine crée avec success"));
        session()->flash('notification.type','success');

        return redirect()->route('GETPAGEADDOMAINE');


    }


    /***** function qui renvoie la liste des domaines */

    public function GETLISTEDOMAINE()
    {
        $row = 1;
        $liste = Domaine::All();
        return view('domaine.listedomaine',[
            'liste'=>$liste,
            'row'=>$row
        ]);
    }

    /*** function qui permet de modifier un domaine */

    public function GETPAGEUPDATEDOMAINE()
    {
        $id = $_GET['id'];

        $domaine = Domaine::where('id',$id)->get();
        return view('domaine.updatedomaine',[
            'domaine'=>$domaine
        ]);

    }

    /*** function qui permet de supprimer un domaine */

    public function DELETETEDOMAINE(Request $request,$id)
    {
        $domaine = Domaine::find($id);
        $domaine->delete();
        session()->flash('notification.message',sprintf("Domaine supprimé avec success"));
        session()->flash('notification.type','danger');

        return redirect()->route('GETLISTEDOMAINE');

    }

    /*** funtion qui permet de modifier un domaine */


    public function UPDATEDOMAINE(Request $request,$id)
    {
        $request->validate([
            'nom_domaineupdate'=>['required'],
            'commentaire_domaineupdate'=>['required']
    ]);
            $domaine = Domaine::find($id);
            $domaine->update([
                'nom_domaines'=>$request->nom_domaineupdate,
                'commentaire_domaine'=>$request->commentaire_domaineupdate
            ]);
            session()->flash('notification.message',sprintf("Domaine modifié avec success"));
            session()->flash('notification.type','success');
            return redirect()->route('GETLISTEDOMAINE');

    }


}
