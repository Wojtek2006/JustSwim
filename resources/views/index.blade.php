@extends('layouts.app', ['viewTitle' => 'Strona główna', 'centerText' => false, 'containerFluid' => true])

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
    <div class="row">
        <div class="col">
            <h3>Najbliższe zawody: <strong class="text-warning">01-01-1970</strong> o godzinie <strong
                    class="text-warning">00:00</strong></h3>
        </div>
        <div class="col">
            <h3>Zapisane <strong class="text-warning">0</strong> zawodników</h3>
            <h3>Zapisane <strong class="text-warning">0</strong> drużyn</h3>
            <h3>Zapisane <strong class="text-warning">0</strong> zawodów</h3>
        </div>
    </div>
@endsection
