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
                </tr>
            </thead>
            <tbody>
                @foreach ($competitions as $competition)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $competition->name }}</td>
                        <td></td>
                        <td></td> {{-- TODO: data, godzina --}}
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

@endsection


    {{-- JS scripts --}}
@section('scripts')
    <script src="{{ asset('js/competitions.js') }}"></script> {{-- TODO: walidacja danych --}}
@endsection
