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
      html {
        overflow: hidden;
      }

      #back{
        background:#003A64;
        width:100vw;
        height:100vh;
        text-align:center;
        overflow: hidden;
      }
      #overlay{
        background:#003A64;
        z-index:999;
        width:100vw;
        height:100vh;
        position:fixed;
        pointer-events: none;
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
          font-size:1.25em;
          padding:1.1em;
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
        <form method="POST" action="{{ route('login') }}" class="col-6 offset-3 p-4 mt-4 text-light">
            @csrf
            <h1>Login</h1>
            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Email address">

                    @error('email')
                        <span class="invalid-feedback d-block alert alert-danger" style="font-size:1.1em" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                    placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback d-block alert alert-danger" style="font-size:1.1em" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-10 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                    {{-- 
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                     --}}
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
          color: 0xa071e,
          shininess: 25.00,
          waveHeight: 23.50,
          waveSpeed: 0.45,
          zoom: 0.91
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