@extends('layouts.app', ['viewTitle' => 'Zawody', 'centerText' => true])

@section('content')

<table class="table">
    <thead>
        <tr>
            <td scope="col">#</td>
            <td scope="col">Imię</td>
            <td scope="col">Nazwisko</td>
            <td scope="col">Klasa</td>
            <td scope="col">Płeć</td>
            <td scope="col">Status</td>
            <td scope="col">Drużyna</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($contenders as $contender)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $contender->name }}</td>
                <td>{{ $contender->last_name }}</td>
                <td>{{ $contender->class }}</td>
                <td>{{ $contender->gender }}</td>
                <td>{{ $contender->status }}</td>
                <td>{{ $team[0]->name }}</td>
            </tr>
        @endforeach
    </tbody>

</table>


@endsection