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
  
  @if($ket == "direct")
    <div class="container">
      <header class="d-flex flex-wrap align-items-start justify-content-start justify-content-md-between py-4">
        @auth
        <a href="/home" class="d-flex align-items-start col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </a>
        @else
        <a href="/" class="d-flex align-items-start col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </a>
        @endauth
      </header>
    </div>
    
    <!-- Main form -->
    <div class="container contact-form">
      <div class="contact-image">
        <img src="/img/logo.jpg" alt="rocket_contact">
      </div>
      <form action="/sendmsg" method="post">
        @csrf
        <h3>Drop Your Message To {{ $to }}</h3>
          <div class="row">
            <div class="col-md-6"> 
              @if(session()->has('usrerr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('usrerr') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('msgscss'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('msgscss') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="form-group">
                <input type="hidden" name="to" value="{{ $to }}">
                <input type="text" class="form-control" value="{{ $to }}" disabled>
              </div>
              <div class="form-group">
                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Your Message : " style="width: 100%; height: 80px;" name="message" required></textarea>
                @error("message")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" class="btnContact" value="Send" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <small class="text-muted">Even though this message is anonymous, we really appreciate you if you don't send any abusive, insulting, and similar messages. Because it is possible that the recipient of your message is still a minor.</small>
              </div>
            <div>
              <small>Thanks <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-wink" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/>
              </svg>
              </small>
            </div>
          </div>
        </div>
      </form>
    </div>

  @else  
    <!-- Header -->
    <div class="container">
      <header class="d-flex flex-wrap align-items-start justify-content-start justify-content-md-between py-4 mb-5">
        @auth
        <a href="/home" class="d-flex align-items-start col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </a>
        @else
        <a href="/" class="d-flex align-items-start col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </a>
        @endauth
      </header>
    </div>
    
    <!-- Main form -->
    <div class="container contact-form">
      <div class="contact-image">
        <img src="/img/logo.jpg" alt="rocket_contact">
      </div>
      <form action="/sendmsg" method="post">
        @csrf
        <h3>Drop Your Message</h3>
          <div class="row">
            <div class="col-md-6"> 
              @if(session()->has('usrerr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('usrerr') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('msgscss'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('msgscss') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="form-group">
                <input type="text" class="form-control @error('to') is-invalid @enderror" placeholder="Send message to : " name="to" required>
                @error("to")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Your Message : " style="width: 100%; height: 80px;" name="message" required></textarea>
                @error("message")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" class="btnContact" value="Send" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <small class="text-muted">Even though this message is anonymous, we really appreciate you if you don't send any abusive, insulting, and similar messages. Because it is possible that the recipient of your message is still a minor.</small>
              </div>
            <div>
              <small>Thanks <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-wink" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/>
              </svg>
              </small>
            </div>
          </div>
        </div>
      </form>
    </div>
    @endif
    
    <!-- Bootstrap core JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

  </body>
</html>