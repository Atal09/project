<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/app.scss/app.css', 'resources/js/app.js')
    <title>Document</title>
</head>
<body class="bg-gray-100">

<nav class="bg-black p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-bold">PC Winkel</a>
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-gray-400">Home</a></li>
            <li><a href="/product" class="hover:text-gray-400">Producten</a></li>
            <li><a href="/contact" class="hover:text-gray-400">Contact</a></li>

            <li><a href="/about" class="hover:text-gray-400">Over Ons</a></li>
        </ul>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
</footer>

</body>

</html>
