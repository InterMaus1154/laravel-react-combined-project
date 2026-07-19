<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="version" content="{{config('app.version')}}" >
    <title>{{config('app.name')}}</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="h-dvh flex justify-center items-center bg-gray-50">
    {{$slot}}
</div>
</body>
</html>
