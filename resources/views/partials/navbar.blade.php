<nav class="navbar navbar-expand-sm navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('img/favicon.png') }}" width="30" height="30" class="d-inline-block align-top"
            alt="">
        JustSwim</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
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
        <a href="https://zst.pila.pl/" target="_blank">
            <img src="{{asset("./img/mechanik.png")}}" width="30" style="filter: invert(100)">
        </a>
    </div>
</nav>
{{--  --}}
