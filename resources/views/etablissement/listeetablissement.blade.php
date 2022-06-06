@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Liste des etablissements </h3>
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
                          <th> Numéro </th>
                          <th> nom etablissement</th>
                          <th> ville </th>
                          <th> telephone </th>
                          <th> fax </th>
                          <th>bp</th>
                          <th>email</th>

                          <th>theme du stage</th>
                          <th>Opération</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($listetablissement  as $listeetablissements)
                                    <tr>
                                            <td>
                                                  {{$nombre ++}}
                                            </td>
                                             <td>
                                                 {{$listeetablissements->nom_etablissements}}
                                             </td>          
                                            <td>
                                                {{$listeetablissements->ville}}
                                            </td>
                                            <td>
                                                {{$listeetablissements->telephone}}
                                            </td>
                                            <td> 
                                                {{$listeetablissements->fax}}  
                                            </td>
                                            <td> 
                                                  {{$listeetablissements->bp}}
                                            </td>
                                            <td> 
                                                  {{$listeetablissements->email}}
                                            </td>
                                            <td> 
                                                  {{$listeetablissements->theme}}
                                            </td>
                                            <td> 
                                                <div class="parent">
                                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                                      <a href="{{route('GETPAGEUPDATEETABLISSEMENT',['id'=>$listeetablissements->id])}}"> <i class="mdi mdi-brush"></i></a>
                                                      </div>

                                                      <div class="col-sm-6 col-md-4 col-lg-3">

                                                            <form  action="{{route('DELETEETABLISSEMENT',['id'=>$listeetablissements->id])}}" method="post" >
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