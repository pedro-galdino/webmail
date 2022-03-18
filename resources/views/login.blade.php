@extends('layouts.main')
@section('title', 'Login')
<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body class="d-flex justify-content-center align-items-center bg-primary">
        @include('layouts.initial-forms', ['acao' => 'logar'], ['titulo' => 'Entre na sua conta', 'url' => 'cadastro', 'link' => 'Criar uma nova conta'])
    </body>
</html>
