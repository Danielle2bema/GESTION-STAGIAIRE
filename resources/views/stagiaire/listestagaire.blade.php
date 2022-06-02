@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des stagiaires </h3>
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
                    <table class="table table-bordered table-responsive">
                      <thead>
                        <tr>
                            <th>#</th>
                          <th> Matricule </th>
                          <th> NOM  PRENOM</th>
                          <th> DATE DE NAISSANCE</th>
                          <th>LIEU DE NAISSANCE</th>
                          <th>TELEPHONE</th>
                         
                          <th>EMAIL</th>
                         
                          <th>OPERATION</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($listetagiare  as $item)
                                    <tr>
                                            <td>
                                                  {{$row ++}}
                                            </td>
                                             <td>
                                                 {{$item->matricule}}
                                             </td>
                                            <td>
                                                {{$item->nom_user}} {{$item->prenom_user}}
                                            </td>
                                            <td>
                                                 {{$item->date_de_naissance}}
                                             </td>
                                             <td>
                                                 {{$item->lieu_de_naissance}}
                                             </td>

                                             <td>
                                                 {{$item->telephone}}
                                             </td>

                                             <td>
                                                 {{$item->email}}
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