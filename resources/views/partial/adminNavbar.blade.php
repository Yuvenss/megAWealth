<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF9F46">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('storage/frontend/logomegawealth.png') }}" alt="logo" style="height: 50px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt{{ $active == 'home' ? '; font-weight:750' : '' }}">Home</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt{{ $active == 'manage company' ? '; font-weight:750' : '' }}">Manage Company</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt{{ $active == 'manage real estates' ? '; font-weight:750' : '' }}">Manage Real Estates</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
