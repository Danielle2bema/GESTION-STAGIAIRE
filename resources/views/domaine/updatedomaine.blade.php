@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter le domaine </h3>
             
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
                        @foreach($domaine as $data)
                        <form class="forms-sample" method="POST" action="{{route('UPDATEDOMAINE',['id'=>$data->id])}}">

                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputName1">nom</label>
                                                    <input type="text" name="nom_domaineupdate" class="form-control" id="exampleInputName1" value="{{$data->nom_domaines}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">Commentaire</label>

                                                        <textarea name="commentaire_domaineupdate"  class ="form-control"id="" cols="30" rows="10"></textarea>

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