@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
                    <div class="page-header">
                          <h3 class="page-title"> Ma note </h3>
                          @if(session()->has('notification.message'))
                              <div class="alert alert-{{session('notification.type')}}">
                                    {{session('notification.message')}}
                              </div>
                          @endif
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @if($tache->count()>0)
                
                        <div class="card-body">
                    </p>
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                        
                          <th> Note</th>
                          <th> commentaire_tache</th>
                        

                       
                        </tr>
                      </thead>
                      <tbody>
                            @foreach($tache  as $data)
                                    <tr>
                                      
                                           
                                            <td>
                                                {{$data->note_tache}}
                                            </td>

                                            <td>
                                                {{$data->commentaire_tache}}
                                            </td>
                                          
                                       
                                    </tr>
                            @endforeach
                            
                      </tbody>
                    </table>
                  </div>

                  @else 

                  <p>Votre note n'est pas encore disponible</p>
                    

                    
@endif
                
                </div>
              </div>
             
            </div>
          </div>