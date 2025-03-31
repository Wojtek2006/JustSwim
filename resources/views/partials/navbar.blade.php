<nav class="navbar navbar-expand-sm navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('img/favicon.png') }}" width="30" height="30" class="d-inline-block align-top"
            alt="">
        JustSwim</a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
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
</nav>
