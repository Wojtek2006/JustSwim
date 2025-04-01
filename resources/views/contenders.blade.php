@extends('layouts.app', ['view_title' => 'Zawodnicy'])

@section('scripts')
    <script src="{{ asset('js/contenders.js') }}"></script>
@endsection

@section('content')
    <h1>Zawodnicy</h1>
    <p>Lista zawodników</p>

    <button type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" data-bs-toggle="modal"
        data-bs-target=" #contender-create-modal">Dodaj
        zawodnika</button>
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
                        <td>Lorem, ipsum.</td> {{-- TODO: drużyna + akcje (usuwanie, zmiana) --}}
                        <td>Ugghh...</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('extras')
    <div class="modal fade" id="contender-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dodaj Zawodnika</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('createContender') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Imię</label>
                                    <input type="text" name="name" id="contender-add-name" class="form-control "
                                        placeholder="" aria-describedby="helpId" />
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nazwisko</label>
                                    <input type="text" name="last_name" id="contender-add-surname" class="form-control "
                                        placeholder="" aria-describedby="helpId" />
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Klasa</label>
                                    <input type="text" name="class" id="contender-add-grade" class="form-control "
                                        placeholder="" aria-describedby="helpId" />
                                    <small id="helpId" class="text-muted">max. 3 znaki</small>
                                </div>
                            </div>
                            <div class="col ">
                                <label for="" class="form-label">Płeć</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="K"
                                        id="" />
                                    <label class="form-check-label" for="gender"> Kobieta </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="M"
                                        id="" checked />
                                    <label class="form-check-label" for="gender"> Mężczyzna </label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Status</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="C"
                                        id="" checked />
                                    <label class="form-check-label" for="status"> Cywil </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="W"
                                        id="" />

                                    <label class="form-check-label" for="status"> Wojskowy </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary" id="contender-add-save-button">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
