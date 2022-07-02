<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
</head>
<body>

<div class="container">
    @include('layouts.navigation')
    @yield('content')

</div>

</body>
</html>
