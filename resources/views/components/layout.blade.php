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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Path to your custom app styles-->
    {{-- <link rel="stylesheet" href="path/to/my-app.css"> --}}
</head>

<body>
    <!-- App root element -->
    <div id="app">
        <div class="page">
            <!-- Navbar -->
            <div class="navbar">
                <div class="navbar-bg"></div>
                <div class="navbar-inner">

                    <div class="title">Students List</div>
                    <div class="right">
                        <button id="theme-toggle" class="button button-fill button-round button color-black">Dark &
                            Light
                            Mode</button>
                    </div>

                </div>
            </div>
            {{ $slot }}
        </div>
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
    <script>
        document.querySelectorAll('.tablo-input').forEach((input, index, inputs) => {
            input.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const nextInput = inputs[index + 1];
                    if (nextInput) {
                        nextInput.focus();
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const toggleButton = document.getElementById('theme-toggle');
            const currentTheme = localStorage.getItem('theme');

            if (currentTheme === 'dark') {
                document.documentElement.classList.add('theme-dark');
            }

            toggleButton.addEventListener('click', () => {
                document.documentElement.classList.toggle('theme-dark');
                let theme = 'light';
                if (document.documentElement.classList.contains('theme-dark')) {
                    theme = 'dark';
                }
                localStorage.setItem('theme', theme);
            });
        });
    </script>
    <!-- Path to your app js-->
    {{-- <script type="text/javascript" src="path/to/my-app.js"></script> --}}
    <footer>
        {{-- this is footer --}}
    </footer>
</body>

</html>
