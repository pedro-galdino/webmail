@extends('layouts.main')
@section('title', 'Cadastro')
<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body class="d-flex justify-content-center align-items-center bg-primary">
        @include('layouts.initial-forms', ['acao' => 'cadastrar'], ['titulo' => 'Crie sua conta', 'link' => 'Já possuo uma conta'])
    </body>
</html>
