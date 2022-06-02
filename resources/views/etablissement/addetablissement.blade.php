@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Ajouter un etablissement </h3>
             
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
                    <form class="forms-sample" method="POST" action="{{route('ADDETABLISSEMENT')}}" >

                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">nometablissement</label>
                        <input type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="Entrer le nom de l'etablissement">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">ville</label>
                        <input type="text" name="ville" class="form-control" id="exampleInputEmail3" placeholder="entrer la ville">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">telephone</label>
                        <input type="phone" name="telephone" class="form-control" id="exampleInputEmail3" placeholder="entrer le numero de téléphone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">fax</label>
                        <input type="phone" name="fax" class="form-control" id="exampleInputEmail3" placeholder="entrer le numero fax">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">bp</label>
                        <input type="text" name="bp" class="form-control" id="exampleInputEmail3" placeholder="entrer bp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail3" placeholder="entrer l'email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Convention</label>
                        <select  class ="form-control" name="stage" id="">
                            @foreach($listestage as $items)
                            <option value="{{$items->id}}">{{$items->convention}}</option>
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