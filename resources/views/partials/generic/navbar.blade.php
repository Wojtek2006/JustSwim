<nav class="navbar navbar-expand-sm navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('landing') }}">
        <img src="..." width="30" height="30" class="d-inline-block align-top placeholder" alt="">
        Zawody pływania</a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing') }}">Strona główna</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" href="{{ route('contenders') }}">Zawodnicy</a> -->
                <!-- TODO: -->
                <!-- zależy co chcemy zrobić bo można rozdzielić wyświetlanie zawodnnikow tworzenie usuwanie na rozne widoki niby ale to chyba nie ma sensu najlepiej i tak bedzie zrobic jeden i zmieniac na zywo -->
                <div class="btn-group">
                    <a type="button" class="btn btn-secondary" href="{{ route('contenders') }}">Zawodnicy</a>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">Action</a> -->
                        <!-- <a class="dropdown-item disabled" href="#">Disabled action</a> -->
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="#">Separated link</a> -->
                        <a href="{{ route('contenders') }}" class="dropdown-item">Lista zawodników</a>
                    </div>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="teams.php">Drużyny</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="competitions.php">Zawody</a>
            </li>
        </ul>
    </div>
</nav>