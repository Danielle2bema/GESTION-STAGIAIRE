@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Attribuer une note </h3>
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
                          <th> # </th>
                          <th> nom de la tache</th>
                          <th> nom du stagiaire </th>
                          <th>Opération</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($informationsStagiaire  as $data)
                                    <tr>
                                            <td>
                                                  {{$row ++}}
                                            </td>
                                             <td>
                                                 {{$data->nom_tache}}
                                             </td>          
                                            <td>
                                                {{$data->nom_user}}    {{$data->prenom_user}}
                                            </td>

                                            <td>

                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Donner la note</button>
<!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Entrer la note</h5>
                                                                
                                                        </div>
                                                                    <div class="modal-body">
                                                                        @foreach($tache as $taches)
                                                                                <form action="{{route('ADDNOTE',['idtache'=>$taches->id,'idstagiaire'=>$data->id])}}" method="post">
                                                                                  @csrf
                                                                                                <div class="form-group">
                                                                                                                        <input type="number" name="note" class="form-control" id="">
                                                                                                                        <textarea name="commentaire" class="form-control" style ="margin-top:5px"id="" cols="30" rows="10"></textarea>

                                                                                                </div>
                                                                            </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                                        <button type="submit" class="btn btn-primary">Valider</button>
                                                                                    </div>
                                                                            </form>

                                                                        @endforeach
                   
                                                        </div>
                                                    </div>
                                                    </div>
                                         
                                    
                                       
                                    </tr>
                            @endforeach
                            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             
            </div>
          </div>