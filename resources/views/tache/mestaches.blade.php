@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des mes taches </h3>
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
                @if($datatache->count()>0)
                <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> Numéro </th>
                          <th> nom</th>
                          <th> Date debut</th>
                          <th> Date fin</th>
                          <th>Opération</th>

                       
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($datatache  as $listetaches)
                                    <tr>
                                            <td>
                                                  {{$row ++}}
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
                                                  <a href="{{route('GETPAGEVOIRNOTE',['id'=>$listetaches->id])}}"><i title="Voir ma note" class="mdi mdi-eye"></i></a>
                                            </td>

                                          
                                          
                           
                                    </tr>
                            @endforeach
                            
                      </tbody>
                    </table>

                    @else

                    <p>Vous n'avez aucune tache pour le moment</p>


                @endif
                  </div>
                </div>
              </div>
             
            </div>
          </div>