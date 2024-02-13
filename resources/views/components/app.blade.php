<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('img/pngegg.png') }}" type="image/x-icon">
    <title>social network | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <div class="me-5">
                <a class="navbar-brand" href="#" style="font-family:monospace">
                    <i class="fa-solid fa-wifi me-2 text-success"></i>Social<stron><strong class="text-success">N</strong>etwork</stron>
                </a>
            </div>
          <div class="collapse navbar-collapse ms-5" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 ms-5">
              <li class="nav-item ms-4">
                <a class="nav-link {{ Route::is('publication.index') || request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('publication.index') }}"><i class="fa-solid fa-house"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::is('profile.index') ? 'active' : '' }}" href="{{ route('profile.index') }}">Tous les profile</a>
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
                     {{ Str::limit(Auth::user()->name, 10, '...')  }}
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}">Modifier</a></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}">de Connecte</a></li>
                    </ul>
                </div>
                @endauth
                @guest
                </ul>
                <div class="d-flex">
                    <a class="text-decoration-none text-success" href="{{ route('login') }}"><button class="btn btn-outline-success mx-2" type="button">Se Conecte</button></a>
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
    {{-- fontAwesome --}}
    <script src="https://kit.fontawesome.com/e6515fe9c1.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/js.js')}}"></script>
</body>
</html>
