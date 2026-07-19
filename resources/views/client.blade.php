<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/main.tsx'])
</head>
<body>

{{--react root--}}
<div id="root"></div>
</body>
</html>
