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
                              @foreach($informationstage as $data)
                              <form class="forms-sample" method="POST" action="{{route('UPDATESTAGE',['id'=>$data->id])}}">

                                              @csrf




                                              <div class="form-group">
                                                <label for="exampleInputName1">Nom du domaine</label>

                                                <select name="nom_domaineupdate" id="" class="form-control">
                                                        @foreach($alldomaine as $datadomaine)
                                                                  <option value="{{$datadomaine->id}}">{{$datadomaine->nom_domaines}} </option>
                                                        @endforeach
                                                </select>
                                              </div>


                                              <div class="form-group">
                                                <label for="exampleInputEmail3">Date debut</label>
                                                <input type="date" name="datedebutupdate" class="form-control" id="exampleInputEmail3" value="{{$data->date_debut_stage}}">
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputPassword4"> Date fin</label>
                                                <input type="date" name="datefinupdate" class="form-control" id="exampleInputPassword4"value="{{$data->date_fin_stage}}">
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleSelectGender">Theme du stage</label>
                                                      <textarea name="themeupdate"  class="form-control" cols="30" rows="10"></textarea>
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