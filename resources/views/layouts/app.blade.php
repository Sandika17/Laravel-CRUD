<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- Navbar --}}
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">🛍️ CRUD Product</a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white">👤 {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container">
        @yield('content')
    </div>

</body>

</html>