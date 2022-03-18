@extends('layouts.main')
@section('title', 'E-mail')
<html>
    <head> 
        <link href="css/email.css" rel="stylesheet">
    </head>  
    
    @include('layouts.navbar', ['b' => 'active'])
    
    <body class="bg-primary">
        @include('layouts.div-sessions', ['class' => 'container-lg mt-3'])
        <div class="container-lg mt-3 rounded-3">
            <div class="card">
                <div class="card-header"> Novo e-mail </div>
                <div class="card-body">
                    <form action="enviar-email" method="post">
                        @csrf
                        <input type="email" name="sender" class="form-control mb-3" placeholder="Remetente" value="{{ Auth::user()->email }}" disabled>
                        <input type="email" name="recipient" class="form-control mb-3" placeholder="Destinatário" value="{{ old('recipient') }}" required>
                        <input type="text" name="subject" class="form-control mb-3" placeholder="Assunto" value="{{ old('subject') }}" required>
                        <textarea name="body" class="form-control mb-3" placeholder="Conteúdo" rows="8" style="resize:none" required>{{ old('body') }}</textarea>
                        <input type="checkbox" name="checkbox" class="form-check-input mb-2" id="check">
                        <label class="form-check-label" for="check">Enviar para o e-mail real</label>
                        <div class="d-grid mb-2 col-2 mx-auto">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
