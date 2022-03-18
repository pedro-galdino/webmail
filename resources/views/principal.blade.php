@extends('layouts.main')
@section('title', 'Home')
<html>
    <head>
        <link href="css/home.css" rel="stylesheet">
    </head>  
    
    @include('layouts.navbar', ['a' => 'active'])
    
    <body class="bg-primary">
        <div class="d-flex justify-content-center">
            <div class="div-emails container-lg row bg-white mt-3 pb-2 rounded-3">
            @include('layouts.home-col', ['emails' => $recebidos], ['h2' => 'Recebidos', 'acao' => 'recebeu', 'email' => '$recebido', 'readed' => 'recipient_readed'])
            @include('layouts.home-col', ['emails' => $enviados], ['h2' => 'Enviados', 'acao' => 'enviou', 'email' => '$enviado', 'readed' => 'sender_readed'])
            </div>
        </div>
        <form action="" method="POST" id="form1"> <!-- Form dinâmico --> 
            @csrf
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/home.js"></script>
</html>
