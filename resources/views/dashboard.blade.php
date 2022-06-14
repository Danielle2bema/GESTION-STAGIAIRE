<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
        @include('layout.header')
        <div class="main-panel">
                <div class="content-wrapper">
                             @if(auth()->user()->role ==='admin' || auth()->user()->role === 'encadreur')
                        <div class="tab-content tab-transparent-content">
                                    <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                                        <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres de stages</h5>

                                                                @if($totalstage->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$totalstage->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                <p class="mt-4 mb-0">G-S</p>
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres de stagiaires</h5>
                                                                @if($totalstagiaire->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$totalstagiaire->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                <p class="mt-4 mb-0">G-S</p>
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres de taches</h5>
                                                                @if($totaltache->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$totaltache->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                <p class="mt-4 mb-0">G-S</p>
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres d'établissements</h5>
                                                                @if($totaletablissement->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$totaletablissement->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                      <p class="mt-4 mb-0">G-S</p>
                                                                </div>
                                                     </div>

                                              </div>
                                        
                                </div>


                                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                                        <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres de domaines</h5>
                                                                @if($totaldomaine->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$totaldomaine->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                <p class="mt-4 mb-0">G-S</p>
                                                    </div>
                                                </div>

                                        </div>

                                </div>

                                </div>

                         @endif


                         @if(auth()->user()->role==='stagiaire')
                         <div class="tab-content tab-transparent-content">
                                    <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                                        <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres de stages</h5>
                                                                @if($stagestgiaire->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$stagestgiaire->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                <p class="mt-4 mb-0">G-S</p>
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                            <div class="card">
                                                    <div class="card-body text-center">
                                                                <h5 class="mb-2 text-dark font-weight-normal">Nombres de taches</h5>
                                                                @if($tachestagiaire->count()>0)
                                                                     <h2 class="mb-4 text-dark font-weight-bold">{{$tachestagiaire->count()}}</h2>
                                                                        @else
                                                                        <h2 class="mb-4 text-dark font-weight-bold">0</h2>


                                                                @endif
                                                                <p class="mt-4 mb-0">G-S</p>
                                                    </div>
                                                </div>

                                        </div>
                                        </div>
                                    </div>
                                            
                          </div>

                         @endif

                </div>
         </div>
</body>
</html>