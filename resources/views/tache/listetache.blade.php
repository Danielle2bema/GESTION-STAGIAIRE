@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des taches </h3>
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
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> Numéro </th>
                          <th> nom</th>
                          <th> Date debut</th>
                          <th> Date fin</th>
                          <th>Nom du stagiaire</th>

                          <th>
                                Opération
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($listetache  as $listetaches)
                                    <tr>
                                            <td>
                                                  {{$nombre ++}}
                                            </td>
                                             <td>
                                                 {{$listetaches->nom_tache}}
                                             </td>
                                            <td>
                                                {{$listetaches->date_debut_tache}}
                                            </td>
                                            <td>
                                                {{$listetaches->date_fin_tache}}
                                            </td>

                                            <td>
                                                {{$listetaches->nom_user}} {{$listetaches->prenom_user}}
                                            </td>
                                          
                                            <td> 
                                                <div class="parent">
                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <a href="{{route('GETPAGEUPDATETACHE',['id'=>$listetaches->id])}}" ><i class="mdi mdi-brush"></i></a>
                                                      </div>

                                                  <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <form action="{{route('DELETETACHE',['id'=>$listetaches->id])}}" method="post">
                                                            @csrf
                                                            <button type="submit"><i class="mdi mdi-delete"></i></button>
                                                      </form>
                                                 </div>

                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                             <a href="{{route('GETPAGESEENOTEBYTACHEID',['id'=>$listetaches->id])}}" ><i style="margin-left:25px" class="mdi mdi-eye"></i></a>
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