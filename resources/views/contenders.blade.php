@extends('layouts.app', ['view_title' => 'Zawodnicy'])

@section('scripts')
    <script src="{{ asset('js/contenders.js') }}"></script>
    <script>
    </script>
@endsection

@section('content')
    <h1>Zawodnicy</h1>
    <p>Lista zawodników</p>

    <button type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" data-toggle="modal"
        data-target=" #contender-create-modal">Dodaj
        zawodnika</button>

@endsection

@section('extras')
    <div class="modal fade" id="contender-create-modal" tabindex="-1" role="dialog"
        aria-labelledby="contender-create-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contender-create-modal-label">Wprowadzanie danych zawodnika</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Imię</label>
                                <input type="text" name="" id="contender-add-name" class="form-control " placeholder=""
                                    aria-describedby="helpId" />
                                <!-- <small id="helpId" class="text-muted">Help text</small> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nazwisko</label>
                                <input type="text" name="" id="contender-add-surname" class="form-control " placeholder=""
                                    aria-describedby="helpId" />
                                <!-- <small id="helpId" class="text-muted">Help text</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Klasa</label>
                                <input type="text" name="" id="contender-add-grade" class="form-control " placeholder=""
                                    aria-describedby="helpId" />
                                <small id="helpId" class="text-muted">max. 3 znaki</small>
                            </div>
                        </div>
                        <div class="col ">
                            <label for="" class="form-label">Płeć</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contender-add-gender" value="" id="" />
                                <label class="form-check-label" for="gender"> Kobieta </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contender-add-gender" value="" id=""
                                    checked />
                                <label class="form-check-label" for="gender"> Mężczyzna </label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Status</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contender-add-status" value="" id=""
                                    checked />
                                <label class="form-check-label" for="status"> Cywil </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contender-add-status" value="" id="" />

                                <label class="form-check-label" for="status"> Wojskowy </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-primary" onclick="SendData()" id="contender-add-save-button"
                        disabled>Zapisz</button>
                </div>
            </div>
        </div>
    </div>
@endsection