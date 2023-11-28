<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'Student Management')</title>

  @vite(['resources/css/app.css', 'resources/bootstrap/css/bootstrap.min.css'])

  <style>
    #sidebar {
      min-width: 260px;
      background-color: #7000FF;
      box-shadow: 4px 0px 4px black;
    }

    #sidebar>ul {
      list-style-type: none;
      padding: 0;
    }

    #sidebar>ul a {
      position: relative;
      display: block;
      padding: 1rem;
      color: white;
      text-decoration: none;
      text-align: center;
    }

    #sidebar>ul a.active {
      font-weight: bold;
    }

    #sidebar>ul a.active>span {
      content: '';
      display: block;
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      min-width: 5px;
      background: white;
      border-radius: 1rem;
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
  </style>

  @yield('styles')

</head>

<body class="vh-100 d-flex">
  <x-sidebar />
  <x-content-layout>
    <x-slot:header-title>@yield('header-title')</x-slot>
      @yield('content')
  </x-content-layout>
  @vite(['resources/bootstrap/js/bootstrap.min.js'])

  @yield('scripts')
</body>

</html>
