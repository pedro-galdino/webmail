@extends('layouts.main')
@section('title', $email->subject)
<html>
    <head>
        <link href="/css/mensagem.css" rel="stylesheet">
    </head>

    @include('layouts.navbar')

    <body class="bg-primary">
        <div class="container-lg mt-3 py-3 rounded-3 bg-white">
            <div class="d-flex justify-content-between mt-2">
                <div class="mx-3">
                    <h3>{{ $email->subject }}</h3>
                </div>
                <div class="mx-3">
                    <button onclick="location.href='/principal';"><i class="fa-solid fa-arrow-left" title="Voltar"></i></button>
                    <button form="form1" onclick="excluir({{ $email->id }})"><i class="fa-solid fa-trash-can" title="Excluir"></i></button>
                    <button form="form1" onclick="ler({{ $email->id }})"><i class="fa-solid fa-envelope" title="Marcar como não lido"></i></button>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div class="mx-3">
                    <b>{{ $email->sender_name }}</b> {{"<" .$email->sender_guarded .">"}}
                </div>
                <div class="mx-3">
                    {{ $email->created_at->format('d/m/Y - H:i') }}
                </div>
            </div>
            <div class="mt-1 mx-3" style="font-size: 0.9rem;">
                Para: {{ $email->recipient }}
            </div>
            <div class="mt-4 mx-3">
                {{ $email->body }}
            </div>
        </div>
        <form action="" method="POST" id="form1"> <!-- Form dinâmico -->
            @csrf
        </form>
    </body>
    <script src="/js/home.js"></script>
</html>
