<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login | Student Management</title>

  @vite(['resources/css/app.css', 'resources/bootstrap/css/bootstrap.min.css'])


</head>

<body class="d-flex vh-100 justify-content-center align-items-center">

  <form action="/login" method="POST" class="w-25 p-3 border rounded">
    @csrf
    @method('POST')

    <div class="mb-3">
      <h1 class="fs-4 text-center">Student Management</h1>
    </div>

    @error('username')
      <div class="alert alert-danger">
        {{ $message }}
      </div>
    @enderror

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>

  </form>

</body>

</html>
