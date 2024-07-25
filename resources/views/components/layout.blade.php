<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Color theme for statusbar (Android only) -->
    <meta name="theme-color" content="#2196f3">
    <!-- Your app title -->
    <title>My App</title>
    <!-- Path to Framework7 Library Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('framework7/css/framework7.bundle.css') }}">
    <!-- Path to your custom app styles-->
    {{-- <link rel="stylesheet" href="path/to/my-app.css"> --}}
</head>

<body>
    <!-- App root element -->
    <div id="app">

        {{ $slot }}
    </div>
    <!-- Path to Framework7 Library Bundle JS-->
    <script type="text/javascript" src="{{ asset('framework7/js/framework7.bundle.js') }}"></script>
    <script>
        var app = new Framework7({
            // App root element
            root: '#app',
            // App Name
            name: 'My App',
            // App id
            id: 'com.myapp.test',
            // Enable swipe panel
            panel: {
                swipe: 'left',
            }
        });
    </script>
    <!-- Path to your app js-->
    {{-- <script type="text/javascript" src="path/to/my-app.js"></script> --}}
    <footer>
        {{-- this is footer --}}
    </footer>
</body>

</html>
