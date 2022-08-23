<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="{{ asset('js/jquery.inputmask.min.js') }}" defer></script>
        <script src="{{ asset('js/inputmask.binding.js') }}" defer></script>
                
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>    
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
        <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet" />  
                
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! htmlScriptTagJsApi() !!}

        @stack('styles')
        @stack('scripts')

        


        
    
        
        
       







        <style>
            .scrollbar-container {
            background-color: #fdfdfd;
            height: 100%;
            width: 100%;
            overflow-x: scroll;
            }
            /* custom scrollbar */
            ::-webkit-scrollbar {
            width: 20px;
            }

            ::-webkit-scrollbar-track {
            background-color: transparent;
            }
        </style>



<style>
    .loading {
        z-index: 20;
	position: absolute;
	top: 0;
	left:-5px;
	width: 100%;
	height: 100%;
    background-color: rgba(0,0,0,0.4);
    }
    .loader {
  --path: #2F3545;
  --dot: #5628EE;
  --duration: 3s;
  top:50%;
  left:50%;
  width: 44px;
  height: 44px;
  position: absolute;
}
    .loader:before {
      content: "";
      width: 6px;
      height: 6px;
      border-radius: 50%;
      position: absolute;
      display: block;
      background: var(--dot);
      top: 37px;
      left: 19px;
      transform: translate(-18px, -18px);
      -webkit-animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
              animation: dotRect var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }
    .loader svg {
      display: block;
      width: 100%;
      height: 100%;
    }
    .loader svg rect,
    .loader svg polygon,
    .loader svg circle {
      fill: none;
      stroke: var(--path);
      stroke-width: 10px;
      stroke-linejoin: round;
      stroke-linecap: round;
    }
    .loader svg polygon {
      stroke-dasharray: 145 76 145 76;
      stroke-dashoffset: 0;
      -webkit-animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
              animation: pathTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }
    .loader svg rect {
      stroke-dasharray: 192 64 192 64;
      stroke-dashoffset: 0;
      -webkit-animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
              animation: pathRect 3s cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }
    .loader svg circle {
      stroke-dasharray: 150 50 150 50;
      stroke-dashoffset: 75;
      -webkit-animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
              animation: pathCircle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }
    .loader triangle {
      width: 48px;
    }
    .loader triangle:before {
      left: 21px;
      transform: translate(-10px, -18px);
      -webkit-animation: dotTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
              animation: dotTriangle var(--duration) cubic-bezier(0.785, 0.135, 0.15, 0.86) infinite;
    }
    
    @-webkit-keyframes pathTriangle {
      33% {
        stroke-dashoffset: 74;
      }
      66% {
        stroke-dashoffset: 147;
      }
      100% {
        stroke-dashoffset: 221;
      }
    }
    
    @keyframes pathTriangle {
      33% {
        stroke-dashoffset: 74;
      }
      66% {
        stroke-dashoffset: 147;
      }
      100% {
        stroke-dashoffset: 221;
      }
    }
    @-webkit-keyframes dotTriangle {
      33% {
        transform: translate(0, 0);
      }
      66% {
        transform: translate(10px, -18px);
      }
      100% {
        transform: translate(-10px, -18px);
      }
    }
    @keyframes dotTriangle {
      33% {
        transform: translate(0, 0);
      }
      66% {
        transform: translate(10px, -18px);
      }
      100% {
        transform: translate(-10px, -18px);
      }
    }
    @-webkit-keyframes pathRect {
      25% {
        stroke-dashoffset: 64;
      }
      50% {
        stroke-dashoffset: 128;
      }
      75% {
        stroke-dashoffset: 192;
      }
      100% {
        stroke-dashoffset: 256;
      }
    }
    @keyframes pathRect {
      25% {
        stroke-dashoffset: 64;
      }
      50% {
        stroke-dashoffset: 128;
      }
      75% {
        stroke-dashoffset: 192;
      }
      100% {
        stroke-dashoffset: 256;
      }
    }
    @-webkit-keyframes dotRect {
      25% {
        transform: translate(0, 0);
      }
      50% {
        transform: translate(18px, -18px);
      }
      75% {
        transform: translate(0, -36px);
      }
      100% {
        transform: translate(-18px, -18px);
      }
    }
    @keyframes dotRect {
      25% {
        transform: translate(0, 0);
      }
      50% {
        transform: translate(18px, -18px);
      }
      75% {
        transform: translate(0, -36px);
      }
      100% {
        transform: translate(-18px, -18px);
      }
    }
    @-webkit-keyframes pathCircle {
      25% {
        stroke-dashoffset: 125;
      }
      50% {
        stroke-dashoffset: 175;
      }
      75% {
        stroke-dashoffset: 225;
      }
      100% {
        stroke-dashoffset: 275;
      }
    }
    @keyframes pathCircle {
      25% {
        stroke-dashoffset: 125;
      }
      50% {
        stroke-dashoffset: 175;
      }
      75% {
        stroke-dashoffset: 225;
      }
      100% {
        stroke-dashoffset: 275;
      }
    }
    .loader {
      display: inline-block;
      margin: 0 16px;

        


    }
    
    html {
      -webkit-font-smoothing: antialiased;
    }
    
    * {
      box-sizing: border-box;
    }
    *:before, *:after {
      box-sizing: border-box;
    }
    
    </style>




        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.css" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.js" crossorigin="anonymous"></script>
        
        
       

        <script>    
        function showLoading() {
               var element = document.getElementById("loading");
           element.classList.add("loading");
           
               var element = document.getElementById("loader");
           element.classList.add("loader");

           document.getElementById("loader").style.display = "block";
           
         var a = document.getElementById('svgArea');
           a.setAttribute("viewBox","0 0 86 80");
         
           }
         
           function hideLoading() {
              var element = document.getElementById("loading");
           element.classList.remove("loading");
               var element = document.getElementById("loader");
           element.classList.remove("loader");

           document.getElementById("loader").style.display = "none";
         
         var a = document.getElementById('svgArea');
           a.setAttribute("viewBox","0 0 0 0");
           
           }


           window.addEventListener("load", hideLoading, false);
  
 
            $(document).ready(function() {   //same as: $(function() { 
                showLoading();
            });
        </script>  
        
        
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>      
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        @stack('js')

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div id="loading">
                    <div id="loader" class="loader">
                        <svg id="svgArea" viewBox="0 0 86 80">
                            <polygon points="43 8 79 72 7 72"></polygon>
                        </svg>
                    </div>
                    </div>    
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>   
    <script src="{{ asset('js/select2.min.js') }}"></script>      

</html>