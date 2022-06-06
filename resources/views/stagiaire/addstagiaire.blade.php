@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter un stagiaire </h3>
             
            </div>
            
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Remplir le formulaire</h4>
                    @if(session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}">
                              {{session('notification.message')}}
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="">

                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Matricule</label>
                        <input type="text" name="matricule" class="form-control" id="exampleInputName1" placeholder="Entrer le matricule">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">nom</label>
                        <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Entrer le nom">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">prenom</label>
                        <input type="text" name="prenom" class="form-control" id="exampleInputName1" placeholder="Entrer le prénom">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">date de naissance</label>
                        <input type="date" name="date_de_naissance" class="form-control" id="exampleInputName1" placeholder="Entrer la date de naissance">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">lieu de naisssance</label>
                        <input type="text" name="lieu_de_naissance" class="form-control" id="exampleInputName1" placeholder="Entrer le lieu de naissance">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">telephone</label>
                        <input type="phone" name="telephone" class="form-control" id="exampleInputName1" placeholder="Entrer le numéro de téléphone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Entrer l'email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">photo</label>
                        <input type="text" name="photo" class="form-control" id="exampleInputName1" placeholder="Entrer une photo">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Entrer un mot de passe">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Date debut</label>
                        <input type="date" name="datedebut" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4"> Date fin</label>
                        <input type="date" name="datefin" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Theme du stage</label>
                              <textarea name="theme"  class="form-control" cols="30" rows="10"></textarea>
                      </div>

  
                  
                      <button type="submit" class="btn btn-primary mr-2">Creer</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>