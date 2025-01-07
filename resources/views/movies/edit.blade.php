<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            color: #333;
        }
        .navbar {
            background-color: #0f2d3c;
        }
        .btn-primary {
            background-color: #40e0d0;
            border-color: #40e0d0;
        }
        .btn-primary:hover {
            background-color: #36c7c0;
            border-color: #36c7c0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Movie App</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4">Editar pelicula</h1>
        
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titulo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $movie->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripcion</label>
                <textarea name="description" id="description" class="form-control" required>{{ $movie->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="release_year" class="form-label">Año de estreno</label>
                <input type="number" name="release_year" id="release_year" class="form-control" value="{{ $movie->release_year }}" required>
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" name="director" id="director" class="form-control" value="{{ $movie->director }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary text-black">Actualizar</button>
        </form>
    </div>
</body>
</html>
