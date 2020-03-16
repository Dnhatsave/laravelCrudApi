<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="csrf-token" content=" {{ csrf_token() }} ">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    
        <title>Cadastro</title>
    
        <!-- Bootstrap core CSS -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href=" {{ asset('css/pricing.css') }}" rel="stylesheet">
        <style>
            body{
                padding: 25px;
            }
            .navbar{
                margin-bottom: 20px;
            }
            .imagem{
                margin: auto;
                height: 230px;
                padding: 20px;
            }
        </style>
      </head>
<body>
    <div class="container">
        @component('Cadastro.navbar',["current" => $current]) {{--Passar o parametro das views para o link current--}}        
        @endcomponent
         <main role="main">
             @hasSection ('body')
             @yield('body')                 
             @endif
         </main>
    </div>
    

    <script src=" {{ asset('js/app.js') }}" type="text/javascript"></script>

    @hasSection ('javascript')
    @yield('javascript')
    @endif
</body>
</html>