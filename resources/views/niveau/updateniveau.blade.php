@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Modifier  un niveau </h3>
             
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
                            @foreach($informationniveau as $informationniveaux)
                            <form class="forms-sample" method="POST" action="{{route('UPDATENIVEAU',['id'=>$id=$informationniveaux->id])}}">
            
                                    @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">niveau</label>
                                            <input type="text" name="niveauupdate" class="form-control" id="exampleInputName1" value={{$informationniveaux->niveau}}>
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