<!doctype html>
<html lang="en">
  <head>
    <title>BookIt - Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!--App CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo:900&display=swap" rel="stylesheet">
    <style>
      #back{
        background:#003A64;
        width:100vw;
        height:100vh;
        text-align:center;
      }
      #overlay{
        background:#003A64;
        z-index:999;
        width:100vw;
        height:100vh;
        position:fixed;
        pointer-events: none;
      }
      .form-control{
        all:unset;
      }
      #mid{
        position:relative;
        top:50%;
        transform:translateY(-50%);
      }
      input[type='text'],
      input[type='email'],
      input[type='password']{
          background:transparent;
          border:0;
          font-size:1.1em;
          padding:1em;
          width:100%;
          box-sizing: border-box;
          color:#fff;

          border-radius:1em;
      }
      h1{
          font-family: 'Heebo', sans-serif;
          border-bottom:1px solid #fff;
          margin:0 10vw 1em;
          padding-bottom: .5em;
      }
      ::placeholder{ 
        color:#fff;
        opacity: .5;
      }
      :-ms-input-placeholder{ 
        color:#fff;
        opacity: .5;
      }
      ::-ms-input-placeholder{ 
        color:#fff;
        opacity: .5;
      }
      input:-webkit-autofill,
      input:-webkit-autofill:hover, 
      input:-webkit-autofill:focus,
      textarea:-webkit-autofill,
      textarea:-webkit-autofill:hover,
      textarea:-webkit-autofill:focus,
      select:-webkit-autofill,
      select:-webkit-autofill:hover,
      select:-webkit-autofill:focus {
        -webkit-text-fill-color: #fff;
        transition: background-color 5000s ease-in-out 0s;
      }
      input.is-invalid{
        border:2px solid rgba(255,55,55,0.5);
        box-shadow: #003A64;
      }
    </style>
  </head>
  <body>
    <div id="back">
        <div id="overlay"></div>
        <div id="mid">
        <a href="/">
            <img src="{{ asset('images/shared/logo-w.svg') }}" style="width:20vw">
        </a>
        <form method="POST" action="{{ route('register') }}" class="col-6 offset-3 p-4 mt-4 text-light">
            @csrf

            <h1 class="mb-2">Register</h1>
            <div class="form-group row">
                <div class="col-md-8 offset-md-2">
                    <input id="firstname" type="text" class="@error('firstname') is-invalid @enderror"
                    name="firstname" value="{{ old('firstname') }}"
                    required autocomplete="firstname" autofocus
                    placeholder="First Name">

                    <input id="lastname" type="text" class="@error('lastname') is-invalid @enderror"
                    name="lastname" value="{{ old('lastname') }}"
                    required autocomplete="lastname" autofocus
                    placeholder="Last Name">

                    @error('firstname')
                        <span class="invalid-feedback d-block alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('lastname')
                    <span class="invalid-feedback d-block alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-2">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                    placeholder="Email address">

                    @error('email')
                        <span class="invalid-feedback d-block alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-2">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                    placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback d-block alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-2">
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Confirm Password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-10 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="{{asset('js/three.r92.min.js')}}"></script>
    <script src="{{asset('js/vanta.waves.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        VANTA.WAVES({
            el: "#back",
            color: 0x707,
            shininess: 25.00,
            waveHeight: 5.50,
            waveSpeed: 1.25,
            zoom: 0.80
        })
      });
    </script>

    <script src="{{asset('js/anime.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        anime({
          targets: '#overlay',
          opacity: [1, 0],
          easing: 'easeInOutCirc',
          duration:1000,
          delay:10
        });
      });
    </script>
  </body>
</html>