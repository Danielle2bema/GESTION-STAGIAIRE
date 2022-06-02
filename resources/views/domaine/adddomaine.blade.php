@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter un domaine </h3>
             
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
                    <form class="forms-sample" method="POST" action="{{route('ADDDOMAINE')}}">

                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">nom</label>
                        <input type="text" name="nom_domaine" class="form-control" id="exampleInputName1" placeholder="Entrer le nom ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Commentaire</label>

                            <textarea name="commentaire_domaine"  class ="form-control"id="" cols="30" rows="10"></textarea>

                      </div>

                  
                      <button type="submit" class="btn btn-primary mr-2">Creer</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>