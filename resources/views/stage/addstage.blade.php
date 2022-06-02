@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter un stage </h3>
             
            </div>
            
                        
                  @if($errors->any())
                {
                  <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                
                                            <p> {{$error}}</p>
                                
                            @endforeach
                    </div>
                } 

            @endif
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Remplir le formulaire</h4>
                    @if(session()->has('notification.message'))
                        <div class="alert alert-{{session('notification.type')}}">
                              {{session('notification.message')}}
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{route('ADDSTAGE')}}">

                                        @csrf
                                          <div class="form-group">
                                            <label for="exampleInputName1">Nom du stagiaire</label>

                                            <select name="nom_stagiaire" id="" class="form-control">
                                                    @foreach($allstagiare as $datastagiaire)
                                                              <option value="{{$datastagiaire->id}}">{{$datastagiaire->nom_user}} {{$datastagiaire->prenom_user}}</option>
                                                    @endforeach
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputName1">Nom de l'encadreur</label>

                                            <select name="nom_encadreur" id="" class="form-control">
                                                    @foreach($allencadreur as $dataencadreur)
                                                              <option value="{{$dataencadreur->id}}">{{$dataencadreur->nom_user}} </option>
                                                    @endforeach
                                            </select>
                                          </div>


                                          <div class="form-group">
                                            <label for="exampleInputName1">Nom du domaine</label>

                                            <select name="nom_domaine" id="" class="form-control">
                                                    @foreach($alldomaine as $datadomaine)
                                                              <option value="{{$datadomaine->id}}">{{$datadomaine->nom_domaines}} </option>
                                                    @endforeach
                                            </select>
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