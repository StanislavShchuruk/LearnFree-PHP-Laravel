<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">                       <!--Обеспечивает режим совместимости с максимально-доступной версией IE--> 
        <meta name="viewport" content="width=device-width, initial-scale=1">        <!--Необходимо для адаптивной работы с девайсами-->
        
        <title> {{ $title or 'learnFree' }} </title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        {{-- Стили основной view --}}
        @hasSection ('css')
            @yield('css')
        @endif        
    </head>
    
    <body>    
        {{-- Главная навигационная панель --}}
        @include('partiels.partiel_login_modal')
        @include('partiels.partiel_register_modal')
        <header class="main-header">
            @include('partiels.partiel_navbar')
        </header>
        
        {{-- Основной контент --}}
        @hasSection ('content')
        <div class="content">
            @yield('content')
        </div>
        @endif    
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="{{ asset('js/common.js') }}" ></script>
        @hasSection ('scripts')
            @yield('scripts')
        @endif 
        
        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
        {{--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--}}
    </body>
</html>
