<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.21.0/ui/trumbowyg.min.css">
  <title>@yield('title')</title>
</head>
<body>
  @include('components.message')

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="#">CMS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a 
                  class="nav-link" 
                  href="/"
                  target="_blank"
              >Home</a>
            </li>
            <li class="nav-item active">
              <a 
                  class="nav-link" 
                  href="/body"
              >Content</a>
            </li>
              <li class="nav-item active">
                  <a 
                      class="nav-link {!! request()->routeIs('dashboard') ? 'is-active' : '' !!}" 
                      href="{{ route('all.categories') }}"
                  >Dashboard</a>
              </li>
              <li class="nav-item">
                <a 
                  class="nav-link" 
                  href="/logout"
                >Wyloguj</a>
              </li>
              <li class="nav-item">
                <a 
                  class="nav-link {!! request()->routeIs('register') ? 'is-active' : '' !!}" 
                >User: <b>{{ auth()->user()->name }}</b></a>
              </li>
          </ul>
          </div>
      </div>
  </nav>

  @yield('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ mix("/js/app.js") }}"></script>
</body>
</html>