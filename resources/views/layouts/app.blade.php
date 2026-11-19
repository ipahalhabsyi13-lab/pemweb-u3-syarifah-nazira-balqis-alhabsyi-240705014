
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sweet News') | Sweet News</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.nav')

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <p>♡ Sweet News — Portal Berita Sederhana</p>
        <p>Made with love using Laravel</p>
    </footer>

</body>
</html>
