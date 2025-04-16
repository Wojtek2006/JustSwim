@extends('layouts.app', ['viewTitle' => 'Strona główna', 'centerText' => false, 'containerFluid' => false])

@section('precontent')
    {{-- jumbotron --}}
    <div class="text-center bg-body-tertiary">
        <div class="container-fluid py-5 px-5">
            <h1 class="display-1">JustSwim </h1>
            <small class="text-muted"> aplikacja do zarządzania zawodami</small>
            {{-- ? może jakieś logo mechan albo tutaj albo na navbar?? --}}
        </div>
    </div>
    </div>
    {{-- TODO: wyświetlanie najbliższych zawodów oraz ile zaawdonikow itd. --}}
@endsection

@section('content')
    <div class="row row-cols-3 gap-5 justify-between">
        <div class="col mx-auto">
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
        <div class="col mx-auto">
            <h3>Zapisane <strong class="text-warning">{{ $contendersNum }}</strong> zawodników</h3>
            <h3>Zapisane <strong class="text-warning">{{ $teamsNum }}</strong> drużyn</h3>
            <h3>Zapisane <strong class="text-warning">{{ $competitionsNum }}</strong> zawodów</h3>
        </div>
    </div>
@endsection


@section('head')
    <link rel="stylesheet" href="{{ asset('./css/index.css') }}">
@endsection
