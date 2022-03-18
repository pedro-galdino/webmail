@if(session('success'))
    <div class="d-flex div-success rounded-3 py-1 {{ $class ?? '' }}">
        <span class='text-error'><li> {{ session('success') }} </li></span>
    </div>
@endif

@if($errors->any() || session('error'))
    <div class="d-flex div-error flex-column rounded-3 py-1 {{ $class ?? '' }}">
        @if(session('error'))
            <span class='text-error'><li> {{ session('error') }} </li></span>
        @endif
        @foreach ($errors->all() as $error)
            <span class='text-error'><li> {{ $error }} </li></span>
        @endforeach
    </div>
@endif