@extends('layouts.app', ['view_title' => 'Drużyny'])


@section('content')
    <h1>Drużyny</h1>
    <p>Lista Drużyn</p>

    <button type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" data-bs-toggle="modal"
        data-bs-target=" #team-create-modal">Dodaj
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
    <div class="modal fade" id="team-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dodaj drużynę</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('createTeam') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nazwa</label>
                                    <input type="text" name="name" id="team-add-name" class="form-control "
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Skrót</label>
                                    <input type="text" name="name" id="team-add-code-name" class="form-control "
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                            <button type="submit" class="btn btn-primary" id="team-add-save-button">Zapisz</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
