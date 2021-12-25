<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Nitcrete</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">

    <!-- Icon -->
    <link rel="icon" href="/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="/css/heroes.css" rel="stylesheet">
    <link href="/css/headers.css" rel="stylesheet">

  </head>
  <body> 
      
    <!-- Header -->
  <div class="container">
    <header class="d-flex flex-wrap align-items-start justify-content-start justify-content-md-between py-4">
      <a href="/" class="d-flex align-items-start col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
      </a>
    </header>
  </div>


    <!-- Main home -->
    <main>
      <div class="container col-xl-10 col-xxl-8 px-4">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">This site is made just for fun</h1>
            <p class="col-lg-10 fs-4">This site is still in beta stage, if you find a bug or want to give an idea please contact me directly below, thank you for the help.</p>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="link-secondary text-decoration-none" href="https://www.instagram.com/ntroxygen/">Instagram</a></li>
                <li class="breadcrumb-item"><a class="link-secondary text-decoration-none" href="https://www.facebook.com/aldilan.180705/">Facebook</a></li>
                <li class="breadcrumb-item"><a class="link-secondary text-decoration-none" href="https://t.me/nitroseven">Telegram</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
          @if(session()->has('notlogin'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('notlogin') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
            <form class="p-4 p-md-5 border rounded-3 bg-light" action="/login" method="post">
            @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" name="username" autofocus required>
                <label for="floatingInput">Username</label>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-5">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
                @error("password")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <!-- <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div> -->
              <button class="w-100 btn btn-lg btn btn-warning" type="submit">Sign Up / Log In</button>
              <hr class="my-4">
              <small class="text-muted">By clicking Sign up or Log in, you agree to the terms of use.</small>
            </form>
          </div>
        </div>
      </div>
    </main>
    <!-- Bootstrap core JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

  </body>
</html>