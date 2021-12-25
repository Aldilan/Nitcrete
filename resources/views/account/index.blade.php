<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Send your message</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">

    <!-- Icon -->
    <link rel="icon" href="/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
    <link href="/css/forms.css" rel="stylesheet">

  </head>
  <body> 

   
    <!-- Header -->
    <div class="container">
      <header class="d-flex flex-wrap align-items-start justify-content-start justify-content-md-between py-4 mb-5">
        <a href="/" class="d-flex align-items-start col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </a>
      </header>
    </div>
    
    <!-- Main form -->
    <div class="container contact-form">
      <div class="contact-image">
        <img src="/img/logo.jpg" alt="rocket_contact">
      </div>
      <form action="{{ route('account.update', $account->id) }}" method="post">
        @csrf
        @method('PUT')
        <h3>Update Your Account</h3>
          <div class="row">
            <div class="col-md-6"> 
              @if(session()->has('scssupdt'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('scssupdt') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('pswns'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('pswns') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('accns'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('accns') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="form-group">
                <input type="hidden" value="{{ $account->username }}" name="username" >
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="New username : "value="{{ $account->username }}" disabled>
                @error("username")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="Old password : " name="oldpassword" required>
                @error("oldpassword")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="New password : " name="password" required>
                @error("password")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <p class="text-danger">* <small class="text-muted">Account updates can only be done once in 7 days.</small></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="submit" class="btnContact" value="Change" >
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    
    <!-- Bootstrap core JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

  </body>
</html>