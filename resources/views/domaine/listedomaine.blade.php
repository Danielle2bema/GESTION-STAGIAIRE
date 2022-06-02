@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des domaines </h3>
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
                            @if($liste->count()>0)
                            <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Nom</th>
                          <th> Commentaire</th>
                          <th>
                                Opération
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($liste  as $data)
                                    <tr>
                                            <td>
                                                  {{$row ++}}
                                            </td>
                                             <td>
                                                 {{$data->nom_domaines}}
                                             </td>
                                            <td>
                                                {{$data->commentaire_domaine}}
                                            </td>
                                          
                                            <td> 
                                                <div class="parent">
                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <a href="{{route('GETPAGEUPDATEDOMAINE',['id'=>$data->id])}}" ><i class="mdi mdi-brush"></i></a>
                                                      </div>

                                                  <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <form action="{{route('DELETETEDOMAINE',['id'=>$data->id])}}" method="post">
                                                            @csrf
                                                            <button type="submit"><i class="mdi mdi-delete"></i></button>
                                                      </form>
                                                 </div>
                                            </td>
                                    </tr>
                            @endforeach
                            
                      </tbody>
                    </table>



                                    @else

                                    <p>Pas de domaine pour le moment</p>

                            @endif
                  </div>
                </div>
              </div>
             
            </div>
          </div>