<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Builder</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center">
        <div id="app" class="w-full max-w-4xl bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <form-builder></form-builder>
        </div>
    </div>
</body>
</html>
