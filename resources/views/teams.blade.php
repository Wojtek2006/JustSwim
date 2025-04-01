@extends('layouts.app', ['viewTitle' => 'Drużyny', 'centerText' => true])


@section('content')
    <h1>Drużyny</h1>
    <p>Lista Drużyn</p>

    <button type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" data-bs-toggle="modal"
        data-bs-target=" #teamCreateModal">Dodaj
        drużynę</button>

    <div class="table-resonsive">
        <table class="table table-hover">
            <thead>
                <caption>
                    Drużyny
                </caption>
                <tr class="table-warning">
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Skrót</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->name }}</td> {{-- TODO: dodać skrót drużyny --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('extras')
    <div class="modal fade" id="teamCreateModal" tabindex="-1" aria-labelledby="teamCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="teamCreateModalLabel">Dodaj drużynę</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('createTeam') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fName" class="form-label">Nazwa</label>
                                    <input type="text" name="name" id="fName" class="form-control "
                                        placeholder="Nazwa drużyny" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="fCodeName" class="form-label">Skrót</label>
                                    <input type="text" name="name" id="fCodeName" class="form-control "
                                        placeholder="Skrót drużyny" aria-describedby="fCodeNameHelp" />
                                    <small class="text-muted" id="fCodeNameHelp">Max. 5 znaków</small>
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
@endsection

@section('scripts')
    <script src="{{ asset('./js/teams.js') }}"></script>
@endsection
