<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item mx-1"> <a class="nav-link {{ $a ?? '' }}" href="/principal">Home</a> </li>
            <li class="nav-item mx-1"> <a class="nav-link {{ $b ?? '' }}" href="/email">Enviar e-mail</a> </li>
            <li class="nav-item mx-1"> <a class="nav-link {{ $c ?? '' }}" href="/config">Configurações</a> </li>
            <li class="nav-item mx-1"> <a class="nav-link {{ $d ?? '' }}" href="/logout">Log Out</a> </li>
        </ul>
    </div>
</nav>
