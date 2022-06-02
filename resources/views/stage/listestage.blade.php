@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des stages </h3>
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
                          <th> Numéro </th>
                          <th> Theme </th>
                          <th> Date Debut </th>
                          <th> Date Fin </th>
                          <th>
                                Opération
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($listestage  as $listestages)
                                    <tr>
                                            <td>
                                                  {{$nombre ++}}
                                            </td>
                                             <td>
                                                 {{$listestages->theme}}
                                             </td>          
                                            <td>
                                                {{$listestages->date_debut_stage}}
                                            </td>
                                            <td>
                                                {{$listestages->date_fin_stage}}
                                            </td>
                                          
                                            <td> 
                                                <div class="parent">
                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <a href="{{route('GETPAGEUPDATESTAGE',['id'=>$listestages->id])}}"> <i class="mdi mdi-brush"></i></a>
                                                      </div>

                                                      <div class="col-sm-6 col-md-4 col-lg-3">

                                                            <form  action="{{route('DELETESTAGE',['id'=>$listestages->id])}}" method="post" >
                                                                  @csrf
                                                                  <button type="submit"><i class="mdi mdi-delete"></i></button>
                                                            </form>
                                                       </div>

                                                       <div class="col-sm-6 col-md-4 col-lg-3">
                                                             <a href="{{route('GETLISTESTAGIAIREBYID',['id'=>$listestages->id])}}"><i title="Voir les stagiares" class="mdi mdi-eye"></i></a>
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