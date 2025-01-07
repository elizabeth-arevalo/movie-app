<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Platform</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #0f2d3c;
            --turquoise: #40E0D0;
            --light-gray: #f8f9fa;
        }
        
        .bg-navy { background-color: var(--navy); color: #f8f9fa; }
        .text-turquoise { color: var(--turquoise); }
        .bg-turquoise { background-color: var(--turquoise); }
        
        .btn-turquoise {
            background-color: var(--turquoise);
            color: var(--navy);
            transition: all 0.3s;
        }
        
        .btn-turquoise:hover {
            background-color: #48C9B0;
            transform: translateY(-2px);
        }
        
        .movie-card {
            transition: transform 0.3s;
            height: 100%;
        }
        
        .movie-card:hover {
            transform: translateY(-5px);
        }
        
        .movie-image {
            height: 300px;
            object-fit: cover;
            background-color: var(--navy);
        }
        
        .pagination-dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0;
        }
        
        .pagination-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--turquoise);
            opacity: 0.5;
        }
        
        .pagination-dot.active {
            opacity: 1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-navy sticky-top">
        <div class="container">
            <a class="navbar-brand text-turquoise" href="/">
                MovieHub
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-turquoise" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-turquoise" href="{{'/billboard'}}">Cartelera</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-turquoise" href="{{'contact'}}">Contacto</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-turquoise">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-turquoise ml-2">Registrarse</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-turquoise" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-navy text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 font-weight-bold mb-4">Descubre el Cine</h1>
            <p class="lead mb-4">Las mejores películas y series están aquí. ¡Únete y comienza a disfrutar!</p>
            <div class="d-flex justify-content-center gap-3 px-3 py-3">
                <a href="#movies" class="btn btn-turquoise btn-lg px-4">Ver Cartelera</a>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">Registrarse</a>
                @endguest
            </div>
        </div>
    </header>

    <!-- Featured Movies -->
    <section id="movies" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Películas en Cartelera</h2>
            <div class="row g-4">
                @foreach($movies as $movie)
                    <div class="col-md-4 mb-4">
                        <div class="card movie-card shadow">
                            <!-- Se asume que las imágenes están almacenadas en el servidor o usando un URL -->
                            <img src="img/2.png" width="350" class="movie-image" alt="{{ $movie->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($movie->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-turquoise text-navy">{{ $movie->rating }} ⭐</span>
                                        <span class="text-muted ms-2">{{ $movie->duration }} min</span>
                                    </div>
                                    <a href="#movies" class="btn btn-turquoise">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-dots">
                @for ($i = 1; $i <= ceil(count($movies) / 6); $i++)
                    <div class="pagination-dot {{ $i === 1 ? 'active' : '' }}"></div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Categorías</h2>
            <div class="row g-4">
                @foreach(['Acción', 'Comedia', 'Drama'] as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 text-center border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="h5 mb-3">{{ $category }}</h3>
                                <ul class="list-unstyled text-muted">
                                    <li class="mb-2">Película destacada 1</li>
                                    <li class="mb-2">Película destacada 2</li>
                                    <li class="mb-2">Película destacada 3</li>
                                    <li><a href="#" class="btn btn-turquoise mt-3">Ver más</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-navy text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 mb-4">
                    <h5 class="text-turquoise mb-3">Sobre Nosotros</h5>
                    <p class="text-white">Tu destino principal para descubrir y disfrutar del mejor contenido cinematográfico.</p>
                    <div class="mt-3">
                        <a href="#" class="text-turquoise me-3">Facebook</a>
                        <a href="#" class="text-turquoise me-3">Twitter</a>
                        <a href="#" class="text-turquoise">Instagram</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-turquoise mb-3">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="/billboard" class="text-white text-decoration-none">Cartelera</a></li>
                        <li><a href="/billboard" class="text-white text-decoration-none">Próximos Estrenos</a></li>
                        <li><a href="/billboard" class="text-white text-decoration-none">Promociones</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-turquoise mb-3">Contacto</h5>
                    <ul class="list-unstyled text-white">
                        <li>📧 info@moviehub.com</li>
                        <li>📞 +1 234 567 890</li>
                        <li>📍 Movie Street 123, Cineland</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-turquoise">
            <div class="text-center text-muted">
                <small>&copy; 2025 MovieHub. Todos los derechos reservados.</small>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>