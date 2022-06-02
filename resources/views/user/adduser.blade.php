@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter un utilisateur </h3>
             
            </div>
            
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Remplir le formulaire</h4>
                    @if($errors->any())
                {
                  <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                
                                            <p> {{$error}}</p>
                                
                            @endforeach
                    </div>
                } 

            @endif
                    @if(session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}">
                              {{session('notification.message')}}
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{route('ADDUSER')}}">

                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Matricule</label>
                        <input type="text" name="matricule" class="form-control" id="exampleInputName1" placeholder="Entrer le matricule ">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Entrer le nom ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="exampleInputName1" placeholder="Entrer le prénom ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date de naissance</label>
                        <input type="date" name="datenaissance" class="form-control" id="exampleInputName1" placeholder="Entrer la date de naissance ">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Lieu de naissance</label>
                        <input type="text" name="lieunaissance" class="form-control" id="exampleInputName1" placeholder="Entrer le lieu de naissance">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">TéLéphone</label>
                         <input type="number" name="telephone" class="form-control" id="exampleInputName1" placeholder="Entrer le téléphone ">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Entrer l'email ">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="encadreur">Encadreur</option>
                                <option value="stagiaire">Stagiaire</option>

                            </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Niveau</label>
                            <select name="niveau" id="" class="form-control">
                                        @foreach($getallniveau as $data) 
                                        
                                        <option value="{{$data->id}}">{{$data->niveau}}</option>

                                        @endforeach

                            </select>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputName1">Photo</label>
                        <input type="text" name="photo" class="form-control" id="exampleInputName1" placeholder="Entrer la photo ">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Entrer le password ">
                      </div>


                  
                      <button type="submit" class="btn btn-primary mr-2">Creer</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>