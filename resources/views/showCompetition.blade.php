@extends('layouts.app', ['viewTitle' => 'Zawody', 'centerText' => true])

@section('content')

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

    </table>

    <a type="button" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg" href="{{ route('generate.tracks', ) }}">Generuj Tory</a>


@endsection 