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
    <div class="container">
        <div class="row quickActions">

            <div class="col-lg-6 col-md-12 my-3">
                <h3 class="text-center">Najbliższe zawody:</h3>
                <div class="list-group">
                    @foreach ($nearestCompetitions as $comp)
                        <a href="{{ route('show.competition', $comp->id) }}"
                            class="list-group-item list-group-item-action py-3 translateRight-hover position-relative">
                            <span class=" fw-bold">{{ $comp->name }}</span>
                            -
                            <span class=" fw-bold">{{ $comp->date }}</span>
                            o godzinie
                            <span class=" fw-bold">{{ $comp->start_time }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-12 my-3">
                <h3 class="text-center">Szybkie działania:</h3>
                <div class="list-group quickActionsList">
                    @foreach ([['Zawodnicy', 'contenders'], ['Drużyny', 'teams'], ['Zawody', 'competitions']] as $link)
                        <a href="{{ route($link[1]) }}"
                            class="list-group-item list-group-item-action py-3  translateRight-hover">
                            {{ $link[0] }}
                        </a>
                    @endforeach
                </div>
            </div>
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
