@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Modifier mes informations </h3>
             
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
                    <form class="forms-sample" method="POST" action="{{route('UPDATEMESINFORMATIONS')}}" enctype="multipart/form-data">

                    @csrf
                

                      
                  
                    

                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputName1" value="{{auth()->user()->email}}">
                      </div>

                   


                      <div class="form-group">
                        <label for="exampleInputName1">Photo</label>
                        <input type="file" name="photo" class="form-control" id="exampleInputName1" placeholder="Entrer la photo ">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Entrer le password ">
                      </div>


                  
                      <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>