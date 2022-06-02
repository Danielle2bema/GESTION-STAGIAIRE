@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des stagiaires affectés a ce stage </h3>
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
                          <th> # </th>
                          <th> Nom </th>
                          <th> Prénom </th>
                          <th> TéLéphone </th>
                          <th>Email</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($information  as $data)
                                    <tr>
                                            <td>
                                                  {{$row ++}}
                                            </td>
                                             <td>
                                                 {{$data->nom_user}}
                                             </td>          
                                            <td>
                                                {{$data->prenom_user}}
                                            </td>
                                            <td>
                                                {{$data->telephone}}
                                            </td>

                                            <td>
                                                {{$data->email}}
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