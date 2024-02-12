<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>social network | {{ $title }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family:monospace">
                <i class="fa-solid fa-wifi me-2 text-success"></i>Social<stron><strong class="text-success">N</strong>etwork</stron>
            </a>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link {{ Route::is('publication.index') ? 'active' : '' }}" aria-current="page" href="{{ route('publication.index') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::is('profile.index') ? 'active' : '' }}" href="{{ route('profile.index') }}">Tous les profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::is('information.index') ? 'active' : '' }}" href="{{ route('information.index') }}">information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::is('profile.create') ? 'active' : '' }}" href="{{ route('profile.create') }}">Ajouter Profile</a>
              </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('publication.create') ? 'active' : '' }}" href="{{ route('publication.create') }}">Ajouter Publication</a>
                </li>
                </ul>
                <div class="d-flex ">
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}">Modifier</a></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}">de Connecte</a></li>
                    </ul>
                </div>
                @endauth
                @guest
                <div class="ms-auto">
                <a class="text-decoration-none text-success"  href="{{ route('login') }}"><button class="btn btn-outline-success mx-2" type="button">Se Conecte</button></a>
                </div>
                </div>
                @endguest
          </div>
        </div>
    </nav>

    <div class="container mt-4">
        @include('partials.flashbag')
        {{ $slot }}
    </div>
    @include('partials.footer')

    {{-- bootstrap script --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}

    {{-- fontAwesome --}}
    <script src="https://kit.fontawesome.com/e6515fe9c1.js" crossorigin="anonymous"></script>
</body>
</html>
