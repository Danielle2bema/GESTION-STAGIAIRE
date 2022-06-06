@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Imprimer la carte </h3>
             
            </div>
            
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <button  class="btn btn-primary mr-2  but-imprimer"  onClick="imprimer('print')">Imprimer</button>


                    @foreach($information as $item)

                            <div class="parents" id="print">
                                        <div class="parent_item">
                                                <p>Nom : {{$item->nom_user}} </p>
                                                <p>Prénom : {{$item->prenom_user}} </p>
                                                <p>Matricule: {{$item->matricule}}</p>
                                                <p>Email: {{$item->email}}</p>
                                                <p>Date de naissance: {{$item->date_de_naissance}}</p>
                                                <p>Lieu de naissance: {{$item->lieu_de_naissance}}</p>
                                                <p>Theme du stage:{{$item->theme}}</p>
                                                <p>Date debut : {{$item->date_debut_stage}}</p>
                                                <p>Date fin : {{$item->date_fin_stage}}</p>
                                                
                                        </div>

                                        <div class="parent_item">
                                        <img class="image-carte" src="{{Storage::url($item->photo)}}" alt="image">

                                        </div>
                            </div>



                    @endforeach


                 
                  
                  </div>
                </div>
              </div>
            </div>
          </div>