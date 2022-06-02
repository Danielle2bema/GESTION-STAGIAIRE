@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Modifier  une tache </h3>
             
            </div>
            
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Remplir le formulaire</h4>
                    @if($errors->any())
                {
                  <div class="alert alert-danger">{
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
                            @foreach($informationtache as $informationtaches)
                            <form class="forms-sample" method="POST" action="{{route('UPDATETACHE',['id'=>$id=$informationtaches->id])}}">
            
                                    @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">nom</label>
                                            <input type="text" name="nomupdate" class="form-control" id="exampleInputName1" value={{$informationtaches->nom_taches}}>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Durée</label>
                                            <input type="text" name="dureeupdate    " class="form-control" id="exampleInputEmail3" value="{{$informationtaches->duree_taches}}">
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