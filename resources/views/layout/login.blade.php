<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
   

  </head>
 
  <body class="text-center">
    
    <main class="form-signin d-flex justify-content-center align-items-center min-vh-100">
      <form method="POST" action="/login" class="w-50">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" name="username" placeholder="name@example.com">
          <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
        <button class="w-20 btn btn-lg btn-primary mt-5" type="submit">Sign in</button>
        <button class="w-20 btn btn-lg btn-secondary mt-5" type="button" onclick="window.location.href='{{ url('/') }}'">Back</button>
        <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
        
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
      </form>
    </main>
    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>


</html>