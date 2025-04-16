@extends('layouts.app', ['viewTitle' => 'Zawody', 'centerText' => true])

@section('scripts')
    <script src="{{ asset('./js/showCompetition.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row gap-3">
            <button type="button" class="btn btn-warning mx-auto my-4 d-block btn-lg col">Generuj Tor</button>
            <button type="button" class="btn btn-warning mx-auto my-4 d-block btn-lg col" data-bs-toggle="modal"
                data-bs-target="#competitionAddTeamModal">Dodaj drużynę</button>
        </div>
    </div>

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
                    <th scope="col">Akcja</th>
            </thead>
            <tbody>
                @foreach ($assignedTeams as $team)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $team[0]->name }}</td>
                        <td>{{ $team[0]->shortcut }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm delTeamOpenModal" data-bs-toggle="modal"
                                teamID="{{ $team[0]->id }}" data-bs-target="#removeTeamFromCompetitionModal">
                                <i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

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
                                    @foreach ($availableTeams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

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
    {{-- delete team from competition --}}
    <div class="modal fade" id="removeTeamFromCompetitionModal" tabindex="-1"
        aria-labelledby="removeTeamFromCompetitionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeTeamFromCompetitionModalLabel">Usuń drużynę z zawodów</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>
                <form id="removeTeamFromCompetitionForm" method="POST"
                    action="{{ route('index') }}/competitions/removeTeam/{{ $competition->id }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="confirm" id="fUnassignConfirm" />
                            <label class="form-check-label" for="fUnassignConfirm"> Czy na pewno chcesz usunąć drużynę z
                                zawodów?
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-danger" id="fUnassignButton">Usuń</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
