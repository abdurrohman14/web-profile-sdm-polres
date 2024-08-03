<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <ul class="navbar-nav me-auto burger-menu fs-3">
          <li class="nav-item menu-open">
            <a class="nav-link" href="#">
              <i class="bi bi-list"></i>
            </a>
          </li>
          <li class="nav-item menu-close">
            <a class="nav-link" href="#">
              <i class="bi bi-list"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto flex-column">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('assets/image/police.jpg') }}" alt="Profile" class="profile-img rounded-circle" width="36px" />
              <span class="ms-1">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li> 
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div>