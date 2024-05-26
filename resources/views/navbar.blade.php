  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
    <!-- Laravel Jetstream Navigation Menu -->
    <li class="nav-item dropdown">
        <!-- Profile Photo and User Name -->
        <a class="nav-link" data-toggle="dropdown" href="#">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            @endif
            <span class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{ __('Account Management') }}</span>
            <div class="dropdown-divider"></div>
            <a href="{{ route('profile.show') }}" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> {{ __('Profile') }}
            </a>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> {{ __('API Tokens') }}
                </a>
            @endif

            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}" class="dropdown-item" @click.prevent="$root.submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                </a>
            </form>

            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <span class="dropdown-item dropdown-header">{{ __('Manage Team') }}</span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> {{ __('Team Settings') }}
                </a>
                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <a href="{{ route('teams.create') }}" class="dropdown-item">
                        <i class="fas fa-plus mr-2"></i> {{ __('Create New Team') }}
                    </a>
                @endcan
                <div class="dropdown-divider"></div>
                <span class="dropdown-item dropdown-header">{{ __('Switch Teams') }}</span>
                <div class="dropdown-divider"></div>
                @foreach (Auth::user()->allTeams() as $team)
                    <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                @endforeach
            @endif
        </div>
    </li>


      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>