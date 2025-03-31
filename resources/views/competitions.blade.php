@extends('layouts.app', ['view_title' => 'Zawody'])

@section('content')
<h1>Zawody</h1>
<p>Lista zawodów</p>

<button type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" data-bs-toggle="modal"
  data-bs-target=" #competition-create-modal">Dodaj
  zawody</button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nazwa</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($competitions as $competition)
    <tr>
      <td>{{ $competition->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('extras')

<div class="modal fade" id="competition-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Dodaj Zawody</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route(" createCompetition")}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="" class="form-label">Nazwa</label>
                <input type="text" name="name" id="contender-add-name" class="form-control " placeholder=""
                  aria-describedby="helpId" />
                <!-- <small id="helpId" class="text-muted">Help text</small> -->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
            <button type="submit" class="btn btn-primary">Zapisz</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection