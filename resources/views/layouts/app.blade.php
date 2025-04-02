<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustSwim - {{ $viewTitle }}</title>
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    {{-- Bootsrap 5.0 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Ikonka  --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
</head>

<body>
    {{-- navbar --}}
    @include('partials.navbar')

    {{-- precontent (jumbotron) --}}
    {{-- chybya git?? lmao --}}
    @yield('precontent')

    {{-- content --}}
    <div
        class="@if (isset($containerFluid) && $containerFluid) container-fluid @else container @endif
        @if (isset($centerText) && $centerText) text-center @endif
        my-3">
        {{-- TODO: zmienić na container-fluid i naprawić pozostałe pliki --}}
        @yield('content')
    </div>

    @yield('extras')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/ccb166a5d5.js" crossorigin="anonymous"></script>

    @yield('scripts')


</body>

</html>
