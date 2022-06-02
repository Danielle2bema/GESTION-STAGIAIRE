@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des niveaux </h3>
                          @if(session()->has('notification.message'))
                              <div class="alert alert-{{session('notification.type')}}">
                                    {{session('notification.message')}}
                              </div>
                          @endif
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th>Numéro</th>
                          <th> niveau</th>
                          
                          <th>
                              Opération
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($listeniveau  as $listeniveaux)
                                    <tr>
                                            <td>
                                                  {{$nombre ++}}
                                            </td>
                                             <td>
                                                 {{$listeniveaux->niveau}}
                                             </td>
                                            <td> 
                                                <div class="parent">
                                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                                                    <a href="{{route('GETPAGEUPDATENIVEAU',['id'=>$listeniveaux->id])}}" ><i class="mdi mdi-brush"></i></a>
                                                         </div>
                                                         <div class="col-sm-6 col-md-4 col-lg-3">
                                                            <form action="{{route('DELETENIVEAU',['id'=>$listeniveaux->id])}}" method="post">
                                                                    @csrf
                                                                    <button type="submit"><i class="mdi mdi-delete"></i></button>
                                                            </form>
                                                         </div>
                                                </div>
                                            </td>
                                    </tr>
                            @endforeach
                            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             
            </div>
          </div>