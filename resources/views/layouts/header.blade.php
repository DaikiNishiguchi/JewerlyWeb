<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- POPPER -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/f07a48b915.js" crossorigin="anonymous"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <div class="d-flex">
    <a href=""><img src="..." class="img-thumbnail" alt="..."></a>
    </div>
    <div class="d-flex">  
      <div class="navbar">
        <a>ユーザーネーム  /</a>
        <a href="">ログアウト</a>
      </div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
         MENU
        </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">お気に入り</a></li>
          <li><a class="dropdown-item" href="#">カート</a></li>
          <li><a class="dropdown-item" href="#">購入履歴</a></li>
          <li><a class="dropdown-item" href="#">アカウント情報変更</a></li>
          </ul>
      </div>
    </div>
</div>
</nav>
        <main class="py-4">
            @yield('loginheader')
        </main>
    </div>

</body>