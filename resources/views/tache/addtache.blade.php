@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter une tache </h3>
             
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
                    <form class="forms-sample" method="POST" action="{{route('ADDTACHE')}}">

                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">nom</label>
                        <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Entrer le nom de la tache ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Date debut</label>
                        <input type="date" name="datedebut" class="form-control" id="exampleInputEmail3">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail3">Date fin</label>
                        <input type="date" name="datefin" class="form-control" id="exampleInputEmail3">
                      </div>




                      <div class="form-group">
                                <select name="stagiaire" class="form-control" id="">
                                            @foreach($allstagiare as $data)
                                                    <option value="{{$data->id}}">{{$data->nom_user}} {{$data->prenom_user}}</option>

                                            @endforeach

                                </select>
                      </div>

                  
                      <button type="submit" class="btn btn-primary mr-2">Creer</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>