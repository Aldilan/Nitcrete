<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    @if($ket == 'direct')
      @foreach($users as $user)
        <title>{{$user->username}}</title>
      @endforeach
    @else
      @auth
        <title>{{ Auth::user()->username }}</title>
      @else
        <title>Nitcrete</title>
      @endauth
    @endif

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">

    <!-- Icon -->
    <link rel="icon" href="/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

      body{
        background-color: #FBFBFB;
      }
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

  </head>
  <body> 
  @if($ket == 'direct')
  
  <!-- Header -->
  <header class="py-3 mb-4 bg-dark text-white border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
          <a href="/" class="d-flex align-items-center me-lg-auto text-dark text-decoration-none">
            <img class="bi" src="/img/logo.png" alt="" width="40" height="32">
            <span class="fs-4 text-white">Nitcrete</span>
          </a>
          <div class="col-12 col-lg-auto my-3 mb-lg-0">
            <div class="text-end">
              <div class="btn-group d-flex align-items-center">
                @auth
                  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->username }}
                  </button>
                  <ul class="dropdown-menu">
                    @if(Auth::user()->username == "Aldilan")
                      <li><a class="dropdown-item" href="/webcontrol">Control web</a></li>
                    @endif
                      <li><a class="dropdown-item" href="/sendmsg">Send message</a></li>
                    @foreach($users as $account)
                      <li><a class="dropdown-item" href="{{ route('account.edit' ,$account->id) }}">Change password</a></li>
                    @endforeach
                    <li><hr class="dropdown-divider"></li>
                    <form action="/logout" method="post">
                    @csrf
                      <li><button type="submit" class="dropdown-item btn btn-secondary">Logout</button></li>
                    </form>
                  </ul>
                @else
                  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/sendmsg">Send message</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/login">Login</a></li>
                  </ul>
                @endauth
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main home -->
      <main>
          <div class="px-4 pm-4">
              @if(session()->has('msgscss'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{session('msgscss')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if(session()->has('loginscs'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('loginscs') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('regisscs'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('regisscs') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if(session()->has('rplscss'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('rplscss') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('rplfail'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('rplfail') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="text-center mb-4">
                @foreach($users as $user)
                  <h2 class="display-4 fw-bold">{{$user->username}}'s Inbox</h2>
                @endforeach
              </div>
              @if($msg == 'You have message')
                @foreach($messages as $message)
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4 ms-2">{{ $message->message }}</p>
                        <small><p class="text-end fw-light">{{ $message->created_at }}</p></small>
                    </div>
                    <div class="ms-2 mb-4">
                        <button class="btn btn-outline-dark btn-sm mx-2" onclick="read_more_less_{{$message->id}}()" id="replbtn {{$message->id}}">Show replies</button>
                    </div>
                    <div id="dots {{$message->id}}"></div>
                    <div id="more {{$message->id}}" style="display:none;">
                    @foreach($replies as $reply)
                      @if($reply->id_message == $message->id)
                        <div class="mx-4 mb-1 border-bottom">
                          <p class="link-secondary">{{ $reply->reply }}</p>
                          <small><p class="text-end fw-light">{{ $reply->created_at }}</p></small>
                        </div>
                      @else
                      @endif
                    @endforeach

                      <!-- Read More JS -->
                      <script>
                        function read_more_less_{{$message->id}}()
                        {
                            var dots = document.getElementById('dots {{$message->id}}');
                            var moretext = document.getElementById('more {{$message->id}}');
                            var replbtn = document.getElementById('replbtn {{$message->id}}');

                            if (dots.style.display === 'none') {
                                dots.style.display = 'inline';
                                moretext.style.display = 'none';
                                replbtn.innerHTML = 'Show Replies';
                            }else{
                                dots.style.display = 'none';
                                moretext.style.display = 'inline';
                                replbtn.innerHTML = "Hide Replies";
                            }
                        }
                      </script>
                    </div>
                      <form action="{{ route('reply.store',$message->id) }}" method="post">
                      @csrf
                        <div class="input-group input-group-sm mb-1 px-4">
                          <input type="hidden" name="id_message" value="{{ $message->id }}">
                          <input type="text" name="reply{{$message->id}}" class="form-control @error('reply{{$message->id}}') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Reply message" maxlength="150" required>
                          @error('reply{{$message->id}}')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class = "ps-3 mb-3">
                            <button type="submit" class="btn btn-link link-dark text-decoration-none btn-sm">Send</button>
                        </div>
                      </form>
                </div>
                @endforeach
              @else
                <div class="card">
                    <div class="card-body">
                      @foreach($users as $user)
                        <p class="fs-4 ms-2">{{$user->username}} doesn't have any messages</p>
                      @endforeach
                    </div>
                </div>
              @endif
              <div class="card mt-3">
                <div class="card-body">
                  <form action="/sendmsg" method="post">
                  @csrf
                    @foreach($users as $user)
                      <input type="hidden" name="to" value="{{$user->username}}">
                      <textarea class="form-control" placeholder="Send message to {{$user->username}}" name="message" required></textarea>
                      <div class="mb-3">
                        <p class="text-danger">* <small class="text-muted">{{$user->username}} will never know who sent this message</small></p>
                      </div>
                    @endforeach
                    <div class="d-grid gap-2">
                      <button class="btn btn-warning" type="submit">Send message</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
      </main>
  @else
    @auth
      <!-- Header -->
      <header class="py-3 bg-dark text-white border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
          <a href="/" class="d-flex align-items-center me-lg-auto text-dark text-decoration-none">
            <img class="bi" src="/img/logo.png" alt="" width="40" height="32">
            <span class="fs-4 text-white">Nitcrete</span>
          </a>
          <div class="col-12 col-lg-auto my-3 mb-lg-0">
            <div class="text-end">
              <div class="btn-group d-flex align-items-center">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->username }}
                </button>
                <ul class="dropdown-menu">
                  @if(Auth::user()->username == "Aldilan")
                    <li><a class="dropdown-item" href="/webcontrol">Control web</a></li>
                  @endif
                    <li><a class="dropdown-item" href="/sendmsg">Send message</a></li>
                  @foreach($users as $account)
                    <li><a class="dropdown-item" href="{{ route('account.edit' ,$account->id) }}">Change password</a></li>
                  @endforeach
                  <li><hr class="dropdown-divider"></li>
                  <form action="/logout" method="post">
                  @csrf
                    <li><button type="submit" class="dropdown-item btn btn-secondary">Logout</button></li>
                  </form>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main home -->
      <main>
          <div class="px-4 py-4 border-bottom ">
              <div class="text-center mb-4">
              @if(session()->has('loginscs'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('loginscs') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('regisscs'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('regisscs') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if(session()->has('rplscss'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('rplscss') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session()->has('rplfail'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  {{ session('rplfail') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                  <h1 class="display-4 fw-bold">{{ Auth::user()->username }}'s Inbox</h1>
              </div>
              <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4 text-center">The messages below may be sent from people you know or don't know, so please don't take it seriously, as this is just to cheer you up.</p>
              </div>
              @if($msg == 'You have message')
                @foreach($messages as $message)
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4 ms-2">{{ $message->message }}</p>
                        <small><p class="text-end fw-light">{{ $message->created_at }}</p></small>
                    </div>
                    <div class="ms-2 mb-4">
                        <button class="btn btn-outline-dark btn-sm mx-2" onclick="read_more_less_{{$message->id}}()" id="replbtn {{$message->id}}">Show replies</button>
                    </div>
                    <div id="dots {{$message->id}}"></div>
                    <div id="more {{$message->id}}" style="display:none;">
                    @foreach($replies as $reply)
                    @if($reply->id_message == $message->id)
                      <div class="mx-4 mb-1 border-bottom">
                        <p class="link-secondary">{{ $reply->reply }}</p>
                        <small><p class="text-end fw-light">{{ $reply->created_at }}</p></small>
                      </div>
                    @else
                    @endif
                    @endforeach

                      <!-- Read More JS -->
                      <script>
                        function read_more_less_{{$message->id}}()
                        {
                            var dots = document.getElementById('dots {{$message->id}}');
                            var moretext = document.getElementById('more {{$message->id}}');
                            var replbtn = document.getElementById('replbtn {{$message->id}}');

                            if (dots.style.display === 'none') {
                                dots.style.display = 'inline';
                                moretext.style.display = 'none';
                                replbtn.innerHTML = 'Show Replies';
                            }else{
                                dots.style.display = 'none';
                                moretext.style.display = 'inline';
                                replbtn.innerHTML = "Hide Replies";
                            }
                        }
                      </script>
                    </div>
                      <form action="{{ route('reply.store',$message->id) }}" method="post">
                      @csrf
                        <div class="input-group input-group-sm mb-1 px-4">
                          <input type="hidden" name="id_message" value="{{ $message->id }}">
                          <input type="text" name="reply{{$message->id}}" class="form-control @error('reply{{$message->id}}') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Reply message" maxlength="150" required>
                          @error('reply{{$message->id}}')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class = "ps-3 mb-3">
                            <button type="submit" class="btn btn-link link-dark text-decoration-none btn-sm">Send</button>
                        </div>
                      </form>
                </div>
                @endforeach
              @else
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4 ms-2">{{ $msg }}</p>
                    </div>
                </div>
              @endif
                
                <!-- Copy link -->
              <div class="card">
                  <div class="card-body">
                    <div class="d-grid gap-2 text-center">
                      <input type="text" class="form-control" value="/home/{{ Auth::user()->username }}" disabled>
                      <button id="copyLink" data-text="/home/{{ Auth::user()->username }}" class="btn btn-dark">Copy your direct message link here</button>
                      <ul class="mt-3">
                        @foreach($shares as $share => $value)
                          @if($share == 'facebook')
                            <li class="d-inline mx-3">
                              <a href="{{$value}}" class="text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                              </a>
                            </li>
                          @elseif($share == 'twitter')
                            <li class="d-inline mx-3">
                              <a href="{{$value}}" class="text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                              </a>
                            </li>
                          @elseif($share == 'whatsapp')
                            <li class="d-inline mx-3">
                              <a href="{{$value}}" class="text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                              </a>
                            </li>
                          @else
                            <li class="d-inline mx-3">
                              <a href="{{$value}}" class="text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                                </svg>
                              </a>
                            </li>
                          @endif
                        @endforeach
                      </ul>
                    </div>
                  </div>
              </div>
          </div>
      </main>
    @else
      <!-- Header -->
      <header class="py-3 mb-4 bg-dark text-white border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
          <a href="/" class="d-flex align-items-center me-lg-auto text-dark text-decoration-none">
            <img class="bi" src="/img/logo.png" alt="" width="40" height="32">
            <span class="fs-4 text-white">Nitcrete</span>
          </a>
          <form class="col-12 col-lg-auto my-3 mb-lg-0">
            <div class="text-end">
              <div class="btn-group d-flex align-items-center">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/sendmsg">Send message</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </header>
      
      <!-- Main home -->
      <main>
          <div class="px-4 pt-5 my-5">
              <div class="text-center mb-5">
                  <h1 class="display-4 fw-bold">You haven't logged in yet</h1>
              </div>
              <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4 text-center">
                    Do you want to message now? <a class="text-decoration-none link-dark" href="/sendmsg">Here
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                    </a><br>
                    Or <br>
                    You want to login first? <a class="text-decoration-none link-dark" href="/login">Here
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                      </svg>
                    </a><br>
                  </p>
              </div>
              <div>
                
              </div>
          </div>
      </main>
    @endauth

  @endif

    <!-- Function copy link with js -->
    <script>
    const copyLink = document.querySelector('#copyLink');
    copyLink.addEventListener('click', e => {
      const input = document.createElement('input');
      input.value = copyLink.dataset.text;
      document.body.appendChild(input);
      input.select();
      if(document.execCommand('copy')) {
          alert('Link Copied');
          document.body.removeChild(input);
        }
      });
    </script>

    <!-- Bootstrap core JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

  </body>
</html>