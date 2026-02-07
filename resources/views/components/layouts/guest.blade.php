<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset("storage/scorpsvgrepo1.svg") }}">

    @vite(['resources/css/app.css','resources/css/auth.css', 'resources/js/app.js'])
    @livewireStyles()
    {{-- @turnstileScripts() --}}
</head>
<body  class="w-full bg-rich-black h-full">
    
    
    {{ $slot }}
    @fluxScripts
    @livewireScripts()
</body>
</html>