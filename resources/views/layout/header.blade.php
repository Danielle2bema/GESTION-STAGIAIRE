@include('layout.link')

<div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
        
          </div>
          <ul class="navbar-nav navbar-nav-right">
          
          
     
          
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{Storage::url(auth()->user()->photo)}}" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{auth()->user()->nom_user}} {{auth()->user()->prenom_user}}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{Storage::url(auth()->user()->photo)}}" alt="">
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase pl-2 text-dark">Informations</h5>
                  <p class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>{{auth()->user()->role}}</span>
                   
</p>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="{{route('GETPAGEUPDATEMESINFORMATIONS')}}">
                    <span>Profile</span>
                    <span class="p-0">
                      <span class="badge badge-success">1</span>
                      <i class="mdi mdi-account-outline ml-1"></i>
                    </span>
                  </a>
               
                  <div role="separator" class="dropdown-divider"></div>
                 
                   
                
                  <span>Log Out</span>
                  <form action="{{route('Logout')}}" method="get">
                          <button type="submit">
                                 <i class="mdi mdi-logout ml-1"></i>

                          </button>
                  </form>
                </div>
              </div>
            </li>
           
          
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
          @if(auth()->user()->role==='admin')

          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Utilisateurs</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDUSER')}}">Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETALLUSER')}}">Liste</a></li>
                </ul>
              </div>
            </li>

          @endif

          @if(auth()->user()->role==='stagiaire')

              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                    <span class="menu-title">Gestion de mes taches</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                      <!-- <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDUSER')}}">Ajouter </a></li> -->
                      <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTEDTAGEBYID')}}">Liste de mes taches</a></li>
                    </ul>
                  </div>
                </li>

        @endif



          @if(auth()->user()->role === 'admin' || auth()->user()->role==='encadreur')

          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Stagiaires</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTESTAGIARE')}}">Liste</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Stages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDSTAGE')}}">Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTESTAGE')}}">Liste</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Taches</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDTACHE')}}">Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTETACHE')}}">Liste</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Notes</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDNOTES')}}">Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Modifier</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Liste</a></li>
                </ul>
              </div>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Niveaux</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDNIVEAU')}}">Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTENIVEAU')}}">Liste</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Gestion Domaines</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDOMAINE')}}">Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTEDOMAINE')}}">Liste</a></li>
                </ul>
              </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">Gestion Etablissements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETPAGEADDETABLISSEMENT')}}"> Ajouter </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('GETLISTEETABLISSEMENT')}}"> Liste</a></li>
                </ul>
              </div>
            </li> 

          @endif
          
        
           
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <!-- <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i> -->

                
              </div>
            </li>
          </ul>
        </nav>
       
       
       
    