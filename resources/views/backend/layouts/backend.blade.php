
<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="h-full">
<div class="min-h-full">
   @include('backend.layouts.nav')

     

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</div>
@livewireScripts
</body>
</html>
