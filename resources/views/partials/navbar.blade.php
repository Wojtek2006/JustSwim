<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('img/favicon.png') }}" width="30" height="30" class="d-inline-block align-top"
            alt="">
        JustSwim</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Strona główna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contenders') }}">Zawodnicy </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teams') }}">Drużyny</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('competitions') }}">Zawody</a>
            </li>
        </ul>
    </div>
    {{-- <a href="https://zst.pila.pl/" target="_blank" class="collapse">
        <img src="{{ asset('./img/mechanik.png') }}" width="30" style="filter: invert(100)">
    </a> --}}
    {{-- TODO: --}}

</nav>
