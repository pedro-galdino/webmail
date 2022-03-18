<div>
    @include('layouts.div-sessions')

    <div class="container d-flex justify-content-center bg-white pt-3 pb-1">
        <form action="{{ $acao }}" method="post">
            @csrf
            <h3 class="d-flex justify-content-center mt-2 mb-4">{{ $titulo }}</h3>
            @if($acao == 'cadastrar')
            <input type="text" name="name" class="form-control my-3" placeholder="Seu nome" value="{{ old('name') }}" required>
            @endif
            <input type="email" name="email" class="form-control mb-3" placeholder="E-mail" value="{{ old('email') }}" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Senha" required>
            <button class="btn btn-primary" type="submit">{{ ucfirst($acao) }}</button>
            <a class="link" href="/{{ $url ?? '' }}">{{ $link }}</a>
        </form>
    </div>
</div>