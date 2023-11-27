<!DOCTYPE html>
<html lang="it">
<head>
    <title>@yield('titolo', '')DA SCEGLIERE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    @yield('styles')
</head>
<body>
    <div id="contenitore-globale-modali"></div>
    <?php if(Auth::user()) { ?>
        <div>
            <h1>ciao</h1>
            @yield('body')
        </div>
    <?php } else { ?>
        <div>
            @yield('body')
        </div>
    <?php } ?>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script> --}}
    @yield('scripts')
</body>
</html>