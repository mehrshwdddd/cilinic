<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100">
    <header>
        @include('front.partials.navbar')
    </header>
    <main>
        @include('front.partials.form')
    </main>
    <footer>
        @include('front.partials.footer')
    </footer>

</body>
</html>
