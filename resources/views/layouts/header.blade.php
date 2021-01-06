<header role="banner">
    <nav role="navigation" id="mainNav" class="navbar navbar-dark bg-dark navbar-expand-md"
      aria-label="Main navigation">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">
          <img src="{{asset('img/orange_logo.svg')}}" class="d-inline-block align-bottom mr-3" alt="Logo Orange"
            title="Back to homepage" width="50" height="50" loading="lazy" />
          <span class="h1 mb-0">E-RESERVATION</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#orange-navbar-collapse"
          aria-controls="orange-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse justify-content-between collapse" id="orange-navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{route('reserver')}}">Salles</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="#">Historique</a></li> -->
          </ul>
          <ul class="navbar-nav">
            <li>
              <form class="form-inline my-2 my-lg-0" action="{{route('recherche')}}" method="GET">
                <div class="row">
                  <input name="q" class="col-9 form-control border-top border-left border-right"
                    style="background: transparent;;color:white;border-color: white;" type="search"
                    placeholder="rechercher une salle" aria-label="Search" value="{{Request()->q}}">
                  <button class="btn" style="margin-left:-20px" type="submit"> <i class="svg-search"></i></button>

                </div>
              </form>
            </li>
            <li class="nav-item dropdown">
              <button type="button" class="nav-link btn btn-link btn-inverse dropdown-toggle d-flex align-items-center"
                data-toggle="dropdown">
                <span class="svg-avatar mr-1" aria-hidden="true"></span>
                <span class="text-primary">{{\Auth::user()->name}}<span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('index')}}">Mes reservation</a></li>
                <li><a class="dropdown-item" href="{{route('history')}}">Historique</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Deconnexion</a></li>

              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

  </header>
