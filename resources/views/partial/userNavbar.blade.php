<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #FF9F46">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">
        <img src="/frontend/logomegawealth.png" alt="logo" style="height: 50px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item me-3">
          <a class="nav-link" href="/home" style="color: white; font-size:16pt{{ $active == 'home' ? '; font-weight:750' : '' }}">Home</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="/aboutUs" style="color: white; font-size:16pt{{ $active == 'about us' ? '; font-weight:750' : '' }}">About Us</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt{{ $active == 'but' ? '; font-weight:750' : '' }}">Buy</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt{{ $active == 'rent' ? '; font-weight:750' : '' }}">Rent</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" style="color: white; font-size:16pt{{ $active == 'cart' ? '; font-weight:750' : '' }}">Cart</a>
        </li>
        <li class="nav-item me-3">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link" style="color: white; font-size:16pt; background:none;border:none">Logout</button>
        </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
