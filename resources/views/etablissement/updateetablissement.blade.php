@include('layout.header')
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Modifier etablissement </h3>
             
            </div>
            
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <h4 class="card-title">Remplir le formulaire</h4>
                        @if(session()->has('notification.message'))
                            <div class="alert alert-{{session('notification.type')}}">
                                {{session('notification.message')}}
                            </div>
                        @endif

                    </div>
                            @foreach($informationetablissement as $informationetablissements)
                           <form class="forms-sample" method="POST" action="{{route('UPDATEETABLISSEMENT',['id'=>$id=$informationetablissements->id])}}">

                                 @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputName1">nometablissement</label>
                                                    <input type="text" name="nometablissementupdate" class="form-control" id="exampleInputName1" value={{$informationetablissements->nometablissement}}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">ville </label>
                                                    <input type="text" name="villeupdate" class="form-control" id="exampleInputEmail3"  value={{$informationetablissements->ville}}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword4"> telephone </label>
                                                    <input type="phone" name="telephoneupdate" class="form-control" id="exampleInputPassword4"  value={{$informationetablissements->telephone}}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword4"> fax</label>
                                                    <input type="phone" name="faxupdate" class="form-control" id="exampleInputPassword4"  value={{$informationetablissements->fax}}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword4"> bp</label>
                                                    <input type="text" name="bpupdate" class="form-control" id="exampleInputPassword4"  value={{$informationetablissements->bp}}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword4">email</label>
                                                    <input type="text" name="emailupdate" class="form-control" id="exampleInputPassword4"  value={{$informationetablissements->email}}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">stages</label>
                                                    <select class="form-control" name="stages_idupdate" id="">
                                                            @foreach($listestage as $data)
                                                                            <option value="{{$data->id}}">{{$data->convention}}</option>
                                                            @endforeach
                                                    </select>
                 
                                                </div>

                                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                                <button class="btn btn-light">Cancel</button>
                            </form>

                            @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>