@extends('layouts.app', ['viewTitle' => 'Zawody', 'centerText' => true])

@section('content')
    <h1>Zawody</h1>
    <p>Lista zawodów</p>


    {{-- Add Competition Btn  --}}
    <button type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" data-bs-toggle="modal"
        data-bs-target=" #competition-create-modal">
        Dodaj zawody</button>
    {{-- End Add Competition Btn  --}}


    {{-- Competition Table --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nazwa</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="table-resonsive">
        <table class="table table-hover">
            <thead>
                <caption>
                    Zawody
                </caption>
                <tr class="table-warning">
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Data</th>
                    <th scope="col">Godzina rozpoczęcia</th>
                    <th scope="col">Akcja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competitions as $competition)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $competition->name }}</td>
                        <td>{{ $competition->date }}</td>
                        <td>{{ $competition->start_time }}</td>
                        <td>
                        <button class="btn btn-primary btn-sm editOpenModal" competitionID="{{ $competition->id }}"
                            competitionName="{{ $competition->name }}" competitionDate="{{ $competition->date }}"
                            competitionStartTime="{{ $competition->start_time }}"
                            data-bs-toggle="modal"
                            data-bs-target="#competitionEditModal">
                            <i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-sm delOpenModal" competitionID="{{ $competition->id }}"
                            data-bs-toggle="modal" data-bs-target="#competitionDeleteModal">
                            <i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- End Competition Table --}}

@endsection

@section('extras')

    {{-- Create Competition Modal --}}
    <div class="modal fade" id="competition-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dodaj Zawody</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('competition.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fName" class="form-label">Nazwa</label>
                                    <input type="text" name="name" id="fName" class="form-control"
                                        placeholder="Nazwa zawodów" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fDate" class="form-label">Data</label>
                                    <input type="date" name="date" class="form-control" id="fDate" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fStartTime" class="form-label">Godzina rozpoczęcia</label>
                                    <input type="time" name="start_time" class="form-control" id="fStartTime" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="fSaveButton">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Create Competition Modal --}}

    {{-- Delete Competition Modal --}}
    <div class="modal fade" id="competitionDeleteModal" tabindex="-1" aria-labelledby="competitionDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="competitionDeleteModalLabel">Usuń zawodnika</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"><button>
                </div>
                <form id="deleteCompetitionForm" method="POST" action="{{ route('index') }}/competitions">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="confirm" id="fDelConfirm" />
                            <label class="form-check-label" for="fDelConfirm"> Czy na pewno chcesz usunąć te zawody?
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
    {{-- End Delete Competition Modal --}}

    {{-- Edit Competition Modal --}}
    
    <div class="modal fade" id="competitionEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Zmień dane zawodów</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('index') }}/competitions" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fName" class="form-label">Nazwa</label>
                                    <input type="text" name="name" id="fName" class="form-control"
                                        placeholder="Nazwa zawodów" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fDate" class="form-label">Data</label>
                                    <input type="date" name="date" class="form-control" id="fDate" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fStartTime" class="form-label">Godzina rozpoczęcia</label>
                                    <input type="time" name="start_time" class="form-control" id="fStartTime" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="fSaveButton">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Edit Competition Modal --}}


@endsection


    {{-- JS scripts --}}
@section('scripts')
    <script src="{{ asset('js/competitions.js') }}"></script> {{-- TODO: walidacja danych --}}
@endsection
