@extends('layouts.app', ['viewTitle' => 'Zawodnicy', 'centerText' => true])

{{-- JS scripts --}}
@section('scripts')
    <script src="{{ asset('./js/contenders.js') }}"></script>
    <div class="createToast" data-message="{{ session('message') }}"></div>
@endsection


@section('content')
    <h1>Zawodnicy</h1>

    {{-- {{session('message')}} --}}
    {{-- Add Contender Btn --}}
    <button type="button" class="btn btn-warning mx-auto d-block my-4 btn-lg" data-bs-toggle="modal"
        data-bs-target=" #contenderCreateModal">
        Dodaj zawodnika</button>
    {{-- End Add Contender Btn --}}



    {{-- Contender Table --}}
    <div class="w-100 overflow-x-auto">

        <div class="table-resonsive">
            <table class="table table-hover ">
                <thead>
                    <caption>
                        Zawodnicy
                    </caption>
                    <tr class="table-warning">
                        <th>#</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>Klasa</th>
                        <th>Płeć</th>
                        <th>Status</th>
                        <th>Drużyna</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contenders as $contender)
                        <tr>
                            <th class="scope-row">{{ $loop->iteration }}</th>
                            <td>{{ $contender->name }}</td>
                            <td>{{ $contender->last_name }}</td>
                            <td>{{ $contender->class }}</td>
                            <td>{{ $contender->gender }}</td>
                            <td>{{ $contender->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-tertiary dropdown-toggle border border-tertiary-subtle"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{-- * 1. NULL: brak drużyny --}}
                                        {{-- * 2. 0: drużyna usunięta --}}
                                        {{-- * 3. !0: drużyna istnieje --}}
                                        @if ($contender->team_id == null or !$teams->contains('id', $contender->team_id))
                                            BRAK
                                            {{-- @elseif ()
                                        BRAK / NULL --}}
                                        @else
                                            {{ $contender->team_shortcut }}
                                        @endif {{-- TODO: LEPIEJ TO ZROBVIĆ --}}
                                    </button>
                                    <ul class="dropdown-menu user-select-none">
                                        <li><a class="dropdown-item assignOpenModal"
                                                data-bs-target="#contenderAssignTeamModal" data-bs-toggle="modal"
                                                contenderID="{{ $contender->id }}">Przypisz
                                                do drużyny</a></li>
                                        <li><a class="dropdown-item text-danger unassignOpenModal" data-bs-toggle="modal"
                                                data-bs-target="#contenderUnassignModal"
                                                contenderID="{{ $contender->id }}">Usuń
                                                z drużyny</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row align-items-center justify-content-center px-3">

                                    <button class="btn btn-primary btn-sm editOpenModal mx-1"
                                        contenderID="{{ $contender->id }}" contenderName="{{ $contender->name }}"
                                        contenderSurname="{{ $contender->last_name }}"
                                        contenderGrade="{{ $contender->class }}"
                                        contenderGender="{{ $contender->gender }}"
                                        contenderStatus="{{ $contender->status }}" data-bs-toggle="modal"
                                        data-bs-target="#contenderEditModal">
                                        <i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-danger btn-sm delOpenModal mx-1"
                                        contenderID="{{ $contender->id }}" data-bs-toggle="modal"
                                        data-bs-target="#contenderDeleteModal">
                                        <i class="fa-solid fa-trash-can"></i></button>
                                </div>
                                {{-- <button type="button" class="btn btn-danger btn-sm"
                                onclick="createToast('Dodano: {{ $contender->name }} {{ $contender->last_name }}');">
                                <i class="fa-solid fa-trash"></i>
                            </button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{-- End Contender Table --}}
@endsection

@section('extras')
    {{-- Add Contender Modal --}}
    <div class="modal fade" id="contenderCreateModal" tabindex="-1" aria-labelledby="contenderCreateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contenderCreateModalLabel">Dodaj Zawodnika</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('contender.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fAddName" class="form-label">Imię</label>
                                    <input type="text" name="name" id="fAddName" class="form-control "
                                        placeholder="Imię zawodnika" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fAddSurname" class="form-label">Nazwisko</label>
                                    <input type="text" name="last_name" id="fAddSurname" class="form-control "
                                        placeholder="Nazwisko zawodnika" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fAddGrade" class="form-label">Klasa</label>
                                    <input type="text" name="class" id="fAddGrade" class="form-control "
                                        placeholder="Klasa zawodnika" aria-describedby="fAddGradeHelp" />
                                    <small id="fAddGradeHelp" class="text-muted">Max. 3 znaki</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Płeć</label>
                                    <div class="form-check">
                                        <input class="form-check-input fAdd" type="radio" name="gender" value="K" />
                                        <label class="form-check-label fAdd" for="gender"> Kobieta </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input fAdd" type="radio" name="gender"
                                            value="M" checked />
                                        <label class="form-check-label fAdd" for="gender"> Mężczyzna </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input fAdd" type="radio" name="status"
                                            value="C" checked />
                                        <label class="form-check-label fAdd" for="status"> Cywil </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input fAdd" type="radio" name="status"
                                            value="W" />
                                        <label class="form-check-label fAdd" for="status"> Wojskowy </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="fAddSaveButton">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Add Contender Modal --}}



    {{-- Delete Contender Modal --}}
    <div class="modal fade" id="contenderDeleteModal" tabindex="-1" aria-labelledby="contenderDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contenderDeleteModalLabel">Usuń zawodnika</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>
                <form id="deleteUserForm" method="POST" action="{{ route('index') }}/contenders">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="confirm" id="fDelConfirm" />
                            <label class="form-check-label" for="fDelConfirm"> Czy na pewno chcesz usunąć tego zawodnika?
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-danger" id="fDelButton">Usuń</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- End Delete Contender Modal --}}

    {{-- Edit Contender Modal --}}
    <div class="modal fade" id="contenderEditModal" tabindex="-1" aria-labelledby="contenderEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contenderEditModalLabel">Zmień dane zawodnika</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm" action="{{ route('index') }}/contenders/update" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fEditName" class="form-label">Imię</label>
                                    <input type="text" name="name" id="fEditName" class="form-control "
                                        placeholder="Imię zawodnika" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fEditSurname" class="form-label">Nazwisko</label>
                                    <input type="text" name="last_name" id="fEditSurname" class="form-control "
                                        placeholder="Nazwisko zawodnika" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fEditGrade" class="form-label">Klasa</label>
                                    <input type="text" name="class" id="fEditGrade" class="form-control "
                                        placeholder="Klasa zawodnika" aria-describedby="fEditGradeHelp" />
                                    <small id="fEditGradeHelp" class="text-muted">Max. 3 znaki</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Płeć</label>
                                    <div class="form-check">
                                        <input class="form-check-input fEdit" type="radio" name="gender"
                                            value="K" />
                                        <label class="form-check-label fEdit" for="gender"> Kobieta </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input fEdit" type="radio" name="gender"
                                            value="M" checked />
                                        <label class="form-check-label fEdit" for="gender"> Mężczyzna </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input fEdit" type="radio" name="status"
                                            value="C" checked />
                                        <label class="form-check-label fEdit" for="status"> Cywil </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input fEdit" type="radio" name="status"
                                            value="W" />
                                        <label class="form-check-label fEdit" for="status"> Wojskowy </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="fEditSaveButton">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Edit Contender Modal --}}

    {{-- Assign to team modal --}}
    <div class="modal fade" id="contenderAssignTeamModal" tabindex="-1" aria-labelledby="contenderAssignTeamModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contenderAssignTeamModalLabel">Przypisz zawodnika do drużyny</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>
                <form id="assignToTeamForm" method="POST" action="{{ route('index') }}/contenders/assignTeam">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="" class="form-label">Drużyna</label>
                                <select class="form-select form-select" name="team_id" id="fTeamSelectAssign">
                                    <option selected value="0">Wybierz drużynę</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->shortcut }}: {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="fAssignSaveButton">Przypisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Assign to team modal --}}

    {{-- Unassign team modal --}}
    <div class="modal fade" id="contenderUnassignModal" tabindex="-1" aria-labelledby="contenderUnassignModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contenderUnassignModalLabel">Usuń zawodnika z drużyny</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>
                <form id="unassignContenderForm" method="POST" action="{{ route('index') }}/contenders/unassignTeam">
                    @csrf
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="confirm" id="fDelConfirm" />
                            <label class="form-check-label" for="fUnassignConfirm"> Czy na pewno chcesz usunąć zawodnika z
                                drużyny?
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

    {{-- End Unassign team modal --}}
@endsection
