<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devide-width", initial-sacle="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- For bootstrap I had to run 'composer require laravel/ui' in the CLI
    then run 'php artisan ui bootstrap', 'npm i' and 'npm run dev' to reinstall and compile files again
    Finally add the code below: --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty</title>
  </head>
  <body style="background-color:#DCDCDC;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        {{-- Toggler Responsive Btn --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Navbar --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          {{-- left btns --}}
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard')}}">Dashboard</a>
            </li>
          @endauth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('posts')}}">Posts</a>
            </li>
          </ul>
          {{-- right btns --}}
          <ul class="navbar-nav ml-auto">
            {{-- Two way to make this work for sign in
            @if(auth()->user())
            @else
            @endif
            or we can use... --}}
            @auth
              <li class="nav-item active">
                <span class="nav-link">{{auth()->user()->name}}</span>
              </li>
              <li class="nav-item">
                <form action="{{ route('logout')}}" method="post">
                  @csrf
                  <button class=" btn nav-link" type="submit">Logout</button>
                </form>
              </li>
            @endauth

            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register')}}">Register</a>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
