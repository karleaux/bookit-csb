<!doctype html>
<html lang="en">
  <head>
    <title>BookIt - Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!--App CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
      #back{
        background:linear-gradient(#003A64, #071e2e);
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
      #logo{
        width:50%;
        -webkit-filter: drop-shadow(2px 1px 10px rgba(0,0,0,0.5));
      }
      #logo g{
        fill: none;
        stroke: aliceblue;
        stroke-linejoin: bevel;
        stroke-linecap: round;
      }
    </style>
  </head>
  <body>
    <div id="back2back"></div>
    <div id="back">
      <div id="overlay"></div>
      <div id="mid">
        <a href="/home" class="d-block">
          <svg 
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 853 226"
            id="logo">
            <g>
            <path
            d="M824.256,90.771 L824.256,225.831 L783.949,225.831 L783.949,90.771 L755.370,90.771 L755.370,56.333 L783.949,56.333 L783.949,0.372 L824.256,0.372 L824.256,56.333 L852.970,56.333 L852.970,90.771 L824.256,90.771 ZM704.157,48.800 L746.082,48.800 L746.082,188.300 L704.157,188.300 L704.157,48.800 ZM650.627,188.300 L619.082,135.029 L600.749,157.629 L600.749,188.300 L559.093,188.300 L559.093,48.800 L600.749,48.800 L600.749,109.335 L647.122,48.800 L695.922,48.800 L648.875,107.855 L700.236,188.300 L650.627,188.300 ZM524.158,171.081 C517.283,177.807 509.036,183.099 499.421,186.954 C489.803,190.809 479.200,192.739 467.606,192.739 C456.282,192.739 445.856,190.788 436.331,186.887 C426.804,182.986 418.625,177.695 411.796,171.013 C404.965,164.334 399.640,156.485 395.822,147.472 C392.001,138.459 390.092,128.841 390.092,118.617 C390.092,108.393 391.980,98.775 395.754,89.762 C399.529,80.749 404.854,72.880 411.729,66.154 C418.604,59.427 426.804,54.114 436.331,50.213 C445.856,46.311 456.371,44.361 467.876,44.361 C479.379,44.361 489.917,46.311 499.488,50.213 C509.059,54.114 517.283,59.427 524.158,66.154 C531.033,72.880 536.379,80.749 540.200,89.762 C544.019,98.775 545.929,108.393 545.929,118.617 C545.929,128.841 544.019,138.459 540.200,147.472 C536.379,156.485 531.033,164.355 524.158,171.081 ZM501.578,102.811 C499.690,98.102 497.106,94.067 493.826,90.704 C490.544,87.341 486.702,84.741 482.300,82.901 C477.896,81.064 473.133,80.144 468.011,80.144 C462.976,80.144 458.258,81.064 453.856,82.901 C449.452,84.741 445.610,87.341 442.330,90.704 C439.048,94.067 436.466,98.102 434.579,102.811 C432.691,107.519 431.748,112.744 431.748,118.483 C431.748,124.223 432.691,129.469 434.579,134.222 C436.466,138.976 439.071,143.056 442.397,146.463 C445.721,149.872 449.586,152.496 453.991,154.333 C458.393,156.172 463.111,157.090 468.145,157.090 C473.268,157.090 478.031,156.172 482.435,154.333 C486.837,152.496 490.658,149.893 493.894,146.530 C497.129,143.167 499.690,139.111 501.578,134.356 C503.465,129.604 504.408,124.313 504.408,118.483 C504.408,112.744 503.465,107.519 501.578,102.811 ZM363.357,171.081 C356.482,177.807 348.235,183.099 338.620,186.954 C329.002,190.809 318.399,192.739 306.805,192.739 C295.482,192.739 285.055,190.788 275.530,186.887 C266.003,182.986 257.824,177.695 250.995,171.013 C244.164,164.334 238.840,156.485 235.021,147.472 C231.200,138.459 229.291,128.841 229.291,118.617 C229.291,108.393 231.179,98.775 234.953,89.762 C238.728,80.749 244.053,72.880 250.928,66.154 C257.803,59.427 266.003,54.114 275.530,50.213 C285.055,46.311 295.570,44.361 307.075,44.361 C318.578,44.361 329.116,46.311 338.687,50.213 C348.259,54.114 356.482,59.427 363.357,66.154 C370.232,72.880 375.578,80.749 379.399,89.762 C383.218,98.775 385.128,108.393 385.128,118.617 C385.128,128.841 383.218,138.459 379.399,147.472 C375.578,156.485 370.232,164.355 363.357,171.081 ZM340.777,102.811 C338.889,98.102 336.305,94.067 333.025,90.704 C329.744,87.341 325.902,84.741 321.499,82.901 C317.095,81.064 312.333,80.144 307.210,80.144 C302.176,80.144 297.457,81.064 293.055,82.901 C288.651,84.741 284.809,87.341 281.529,90.704 C278.247,94.067 275.665,98.102 273.778,102.811 C271.890,107.519 270.947,112.744 270.947,118.483 C270.947,124.223 271.890,129.469 273.778,134.222 C275.665,138.976 278.271,143.056 281.597,146.463 C284.920,149.872 288.786,152.496 293.190,154.333 C297.592,156.172 302.310,157.090 307.345,157.090 C312.467,157.090 317.230,156.172 321.634,154.333 C326.036,152.496 329.857,149.893 333.093,146.530 C336.328,143.167 338.889,139.111 340.777,134.356 C342.664,129.604 343.608,124.313 343.608,118.483 C343.608,112.744 342.664,107.519 340.777,102.811 ZM207.832,175.722 C202.036,180.073 195.451,183.255 188.083,185.273 C180.713,187.291 173.254,188.300 165.705,188.300 L76.328,188.300 L76.328,43.016 L65.004,43.016 C60.509,43.016 56.691,43.890 53.546,45.639 C50.399,47.388 47.861,49.519 45.929,52.029 C43.996,54.540 42.603,57.208 41.750,60.033 C40.895,62.858 40.470,65.346 40.470,67.499 C40.470,71.715 40.962,75.301 41.952,78.260 C42.940,81.220 44.244,83.822 45.862,86.063 C47.480,88.306 49.299,90.346 51.322,92.184 C53.344,94.023 55.433,95.973 57.590,98.035 L33.190,120.500 C29.055,117.362 25.011,114.022 21.057,110.479 C17.102,106.937 13.597,102.968 10.542,98.573 C7.486,94.180 5.039,89.314 3.195,83.978 C1.355,78.643 0.388,72.701 0.297,66.154 C0.209,58.711 1.152,51.379 3.128,44.159 C5.106,36.941 8.676,30.461 13.845,24.721 C19.012,18.983 26.066,14.341 35.010,10.798 C43.951,7.256 55.433,5.484 69.453,5.484 L76.328,5.484 L158.021,5.350 C167.007,5.350 175.142,6.493 182.421,8.780 C189.701,11.067 195.923,14.386 201.092,18.734 C206.259,23.085 210.236,28.420 213.022,34.743 C215.807,41.065 217.201,48.308 217.201,56.468 C217.201,60.235 216.595,63.957 215.381,67.633 C214.168,71.312 212.551,74.696 210.528,77.790 C208.506,80.884 206.147,83.597 203.451,85.928 C200.755,88.261 197.924,90.054 194.958,91.309 C199.272,92.835 203.384,94.964 207.293,97.699 C211.202,100.436 214.640,103.641 217.606,107.317 C220.572,110.996 222.931,115.052 224.683,119.491 C226.436,123.931 227.312,128.662 227.312,133.684 C227.312,143.460 225.513,151.823 221.920,158.772 C218.324,165.723 213.629,171.373 207.832,175.722 ZM172.108,51.961 C171.074,49.586 169.703,47.545 167.997,45.841 C166.289,44.138 164.357,42.814 162.200,41.872 C160.043,40.931 157.796,40.460 155.460,40.460 L119.062,40.460 L119.062,78.664 L155.460,78.664 C157.705,78.664 159.908,78.216 162.065,77.319 C164.222,76.423 166.154,75.145 167.862,73.485 C169.568,71.827 170.963,69.832 172.041,67.499 C173.120,65.168 173.659,62.568 173.659,59.696 C173.659,56.918 173.141,54.339 172.108,51.961 ZM181.478,123.124 C180.309,120.568 178.735,118.371 176.759,116.532 C174.781,114.695 172.467,113.282 169.817,112.295 C167.165,111.309 164.357,110.815 161.391,110.815 L119.062,110.815 L119.062,153.189 L161.257,153.189 C163.592,153.189 166.042,152.765 168.603,151.911 C171.165,151.060 173.524,149.759 175.681,148.010 C177.838,146.261 179.634,144.042 181.073,141.351 C182.510,138.661 183.230,135.479 183.230,131.800 C183.230,128.572 182.644,125.680 181.478,123.124 Z"/>
            </g>
          </svg>
        </a>
        <div id="control" style="opacity:0; padding-top:48px">
          <form action="/search" method="post" class="container col-6 offset-3">
              @csrf
              <div class="input-group">
                  <input class="form-control form-control-lg p-4" type="text" placeholder="Search talents here..." name="query" id="query">
                  <input type="submit" value="Search" class="btn btn-primary btn-lg">
              </div>
          </form>
          @guest
            <div class="mt-5">
              <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('Login') }}</a>
              <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
            </div>
          @endguest
          
        </div>
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
    <script src="{{asset('js/vanta.birds.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        const effect = VANTA.BIRDS({
          el: "#back",
          backgroundAlpha: 0.00,
          color1: 0xff00a5,
          color2: 0xffc1ec,
          colorMode: "lerpGradient",
          birdSize: 1.50,
          wingSpan: 25.00,
          speedLimit: 6.00,
          separation: 50.00,
          alignment: 46.00,
          cohesion: 38.00,
          quantity: 4.00
        });
      });
    </script>

    <script src="{{asset('js/anime.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        anime({
          targets: '#overlay',
          opacity: [1, 0],
          easing: 'easeInOutCirc',
          duration:2000,
          delay:10
        });
        anime({
          targets: '#logo g path',
          strokeDashoffset: [anime.setDashoffset, 0],
          easing: 'easeInOutCubic',
          duration: 3000,
          delay: 800
        });
        anime({
          targets: '#logo g path',
          strokeWidth: [4, 0],
          easing: 'easeOutCirc',
          duration: 500,
          delay: 2000
        })
        anime({
          targets: '#logo g',
          fill: ['none', '#fff'],
          easing: 'easeOutCirc',
          duration: 350,
          delay: 2000
        });
        anime({
          targets: '#control',
          translateY: [36, 0],
          opacity: [0, 1],
          easing:'easeInOutQuad',
          delay: 1500,
          duration: 700
        });
      });
    </script>
  </body>
</html>