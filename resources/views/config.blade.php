@extends('layouts.main')
@section('title', 'Configurações')
<html>
    <head>
        <link href="css/email.css" rel="stylesheet">
    </head>

    @include('layouts.navbar', ['c' => 'active'])

    <body class="bg-primary">
        @include('layouts.div-sessions', ['class' => 'container-lg mt-3'])
        <div class="container-lg mt-3 py-3 rounded-3 bg-white">
            <h3 class="text-center mt-2 mb-4">Configurações de envio</h3>
            <form action="enviar-config" method="post">
                @csrf
                <div class="form-group col-5 mx-auto">
                    <select class="form-select mb-3" name="driver" required>
                        <option disabled>Selecione o protocolo</option>
                        <option value="smtp" selected>SMTP</option>
                    </select>
                </div>
                <div class="form-group col-5 mx-auto">
                    <input type="text" name="host" class="form-control mb-3" placeholder="Host" value="{{ old('host') ?? $config->host ?? 'smtp.gmail.com' }}" required>
                </div>
                <div class="form-group col-5 mx-auto">
                    <input type="text" name="port" class="form-control mb-3" placeholder="Porta" value="{{ old('port') ?? $config->port ?? '587' }}" required>
                </div>
                <div class="form-group col-5 mx-auto">
                    <select class="form-select mb-3" name="encryption" required>
                        <option disabled>Selecione a criptografia</option>
                        <option value="tls" selected>TSL</option>
                        <option value="ssl">SSL</option>
                    </select>
                </div>
                <div class="form-group col-5 mx-auto">
                    <input type="email" name="user_name" class="form-control mb-3" placeholder="Seu e-mail" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group col-5 mx-auto">
                    <input type="password" name="password" class="form-control mb-3" placeholder="Senha do e-mail" required>
                </div>
                <div class="form-group col-5 mx-auto">
                    <input type="text" name="sender_name" class="form-control mb-3" placeholder="Seu nome" value="{{ old('sender_name') ?? Auth::user()->name }}" required>
                </div>
                <div class="d-grid mt-4 mb-2 col-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>
