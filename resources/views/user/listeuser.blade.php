@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des utilisateurs </h3>
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
                          <th>ROLE</th>
                          <th>OPERATION</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($data  as $item)
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
                                          
                                             <td>
                                                 {{$item->role}}
                                             </td>

                                             <td> 
                                                <div class="parent">
                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <a href="{{route('GETPAGEUPDATEUSER',['id'=>$item->id])}}" ><i title="Modifier" class="mdi mdi-brush"></i></a>
                                                      </div>

                                                  <div class="col-sm-6 col-md-4 col-lg-3">
                                                      
                                                            <form  method = "POST" action="{{route('DELETEUSER',['id'=>$item->id])}}">
                                                                    @csrf
                                                                    <button type="submit"><i title="supprimer" class="mdi mdi-delete"></i></button>

                                                            </form>                                                    
                                                 </div>

                                                 @if($item->role ==='stagiaire')
                                                 <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <a style="margin-left:10px" href="{{route('GETPAGEIMPRIMERCARTE',['id'=>$item->id])}}" ><i title="Imprimer sa carte"  class="mdi mdi-eye"></i></a>
                                                 </div>

                                                 @endif
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