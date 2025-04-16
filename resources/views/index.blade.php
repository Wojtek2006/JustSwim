@extends('layouts.app', ['viewTitle' => 'Strona główna', 'centerText' => false, 'containerFluid' => false])

@section('precontent')
    {{-- jumbotron --}}
    <div class="text-center " style="background-image: url('{{ asset('./img/swimmer_landing.png') }}')" id="jumbotron">
        <div class="container-fluid py-5 px-5">
            <h1 class="display-1 text-white fw-bold">JustSwim </h1>
            <small class="text-muted"> aplikacja do zarządzania zawodami</small>
            {{-- ? może jakieś logo mechan albo tutaj albo na navbar?? --}}
        </div>
    </div>
    {{-- TODO: wyświetlanie najbliższych zawodów oraz ile zaawdonikow itd. --}}
@endsection

@section('content')
    <div class="container w-75 py-3">
        <div class="container my-3">
            <h3 class="text-center">Najbliższe zawody:</h3>
            <ul class="list-group">
                @foreach ($nearestCompetitions as $comp)
                    <a href="{{ route('show.competition', $comp->id) }}"
                        class="list-group-item list-group-item py-3 nearestCompetitionButton position-relative">
                        <span class=" fw-bold">{{ $comp->name }}</span>
                        -
                        <span class=" fw-bold">{{ $comp->date }}</span>
                        o godzinie
                        <span class=" fw-bold">{{ $comp->start_time }}</span>
                    </a>
                @endforeach
            </ul>
        </div>
        <div class="container text-center my-3">
            <h3>Statystyki:</h3>
            <ul class="list-unstyled">
                <li>Dodano <strong class="text-warning">{{ $contendersNum }}</strong> zawodników</li>
                <li>Dodano <strong class="text-warning">{{ $teamsNum }}</strong> drużyn</li>
                <li>Dodano <strong class="text-warning">{{ $competitionsNum }}</strong> zawodów</li>
            </ul>
        </div>
    </div>
@endsection


@section('head')
    <link rel="stylesheet" href="{{ asset('./css/index.css') }}">
@endsection
