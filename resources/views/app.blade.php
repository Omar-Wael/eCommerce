<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'eCommerce') }}</title>

    <!-- Laravel Mix or Vite CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script type="module" src="{{ mix('js/app.js') }}"></script>

    <!-- Include other meta tags or external resources like Bootstrap -->
</head>

<body class="bg-gray-100">
    <div id="app">
        @yield('content')
    </div>
</body>

</html>
