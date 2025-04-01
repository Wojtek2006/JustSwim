@extends('layouts.app', ['view_title' => 'Strona główna'])

@section('precontent')
    {{-- jumbotron --}}
    <div class="p-5 text-center bg-body-tertiary">
        <div class="container py-5">
            <h1 class="text-body-emphasis">JustSwim</h1>
            <p class="col-lg-8 mx-auto lead">
                This takes the basic jumbotron above and makes its background edge-to-edge with a
                <code>.container</code> inside to align content. Similar to above, it's been recreated with
                built-in
                grid and utility classes.
            </p>
        </div>
    </div>
    {{-- TODO: wyświetlanie najbliższych zawodów oraz ile zaawdonikow itd. --}}
@endsection

@section('content')
    <div class="container my-5">
        <div class="row text-center">
            <div class="col">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
    </div>
@endsection
