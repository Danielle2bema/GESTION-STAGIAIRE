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
                            @foreach($datauser as $data)
                                         <form class="forms-sample" method="POST" action="{{route('UPDATEUSER',['id'=>$data->id])}}">

                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Matricule</label>
                                                            <input type="text" name="matriculeupdate" class="form-control" id="exampleInputName1" value="{{$data->matricule}} ">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Nom</label>
                                                            <input type="text" name="nomupdate" class="form-control" id="exampleInputName1" value="{{$data->nom_user}} ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Prénom</label>
                                                            <input type="text" name="prenomupdate" class="form-control" id="exampleInputName1" value="{{$data->prenom_user}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Date de naissance</label>
                                                            <input type="date" name="datenaissanceupdate" class="form-control" id="exampleInputName1" value="{{$data->date_de_naissance}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Lieu de naissance</label>
                                                            <input type="text" name="lieunaissanceupdate" class="form-control" id="exampleInputName1" value="{{$data->lieu_de_naissance}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">TéLéphone</label>
                                                            <input type="number" name="telephoneupdate" class="form-control" id="exampleInputName1" value="{{$data->telephone}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Email</label>
                                                            <input type="email" name="emailupdate" class="form-control" id="exampleInputName1" value="{{$data->email}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Role</label>
                                                                <select name="roleupdate" id="" class="form-control">
                                                                    <option value="encadreur">Encadreur</option>
                                                                    <option value="stagiaire">Stagiaire</option>

                                                                </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Niveau</label>
                                                                <select name="niveauupdate" id="" class="form-control">
                                                                            @foreach($getallniveau as $data) 
                                                                            
                                                                            <option value="{{$data->id}}">{{$data->niveau}}</option>

                                                                            @endforeach

                                                                </select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Photo</label>
                                                            <input type="text" name="photoupdate" class="form-control" id="exampleInputName1" value="{{$data->photo}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Password</label>
                                                            <input type="password" name="passwordupdate" class="form-control" id="exampleInputName1" value="{{$data->password}}">
                                                        </div>



                                                        <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                                        <button class="btn btn-light">Cancel</button>
                                                        </form>

                            @endforeach
                        </div>
                </div>
              </div>
            </div>
          </div>