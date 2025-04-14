@extends('layouts.app', ['viewTitle' => 'Zawody', 'centerText' => true])

@section('content')
    <div class="container">
        <a type="button" class="btn btn-warning mx-auto my-4 d-block w-75 btn-lg">Generuj Tor</a>
        <button type="button" class="btn btn-warning mx-auto my-4 d-block w-75 btn-lg" data-bs-toggle="modal"
            data-bs-target="#competitionAddTeamModal">Dodaj drużynę</button>
    </div>

<<<<<<< HEAD
<table class="table">
    <thead>
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nazwa Drużyny</td>
            <td scope="col">Skrót</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $team[0]->name }}</td>
                <td>{{ $team[0]->shortcut }}</td>
            </tr>
        @endforeach
    </tbody>
=======
    <div class="table-responsive">
        <table class="table-hover table">
            <thead>
                <caption>
                    {{ $competition->name }}
                </caption>
                <tr class="table-warning">
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Skrót</th>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $team[0]->name }}</td>
                        <td>{{ $team[0]->shortcut }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
>>>>>>> c0080c8 (praca nad dodawaniem druzyn (trzteba insert zrobic w addTeam comptetioncontroller.php)

@section('extras')
    <div class="modal fade" id="competitionAddTeamModal" tabindex="-1" aria-labelledby="competitionAddTeamModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="competitionAddTeamModalLabel">Przypisz zawodnika do drużyny</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>
                <form id="assignToTeamForm" method="POST" action="{{ route('competition.addTeam', $competition->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="" class="form-label">Drużyna</label>
                                <select class="form-select form-select" name="team_id" id="fTeamAddSelect">
                                    <option selected value="0">Wybierz drużynę</option>
                                    @foreach ($teams[0] as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

<<<<<<< HEAD
    <a type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" href="{{ route('generate.tracks', ) }}">Generuj Tory</a>


@endsection 
=======
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="fTeamAddSaveButton">Przypisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
>>>>>>> c0080c8 (praca nad dodawaniem druzyn (trzteba insert zrobic w addTeam comptetioncontroller.php)
