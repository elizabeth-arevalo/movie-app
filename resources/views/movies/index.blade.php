@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="font-semibold text-xl text-white dark:text-turquoise leading-tight text-center py-3" style="color: #004080; ">Lista de Peliculas</h1>

        <div class="table-responsive d-flex justify-content-center py-2 mb-4">
            <table class="table table-striped table-bordered table-hover shadow-lg rounded-lg" style="max-width: 90%; width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Año de estreno</th>
                        <th>Director</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->release_year }}</td>
                            <td>{{ $movie->director }}</td>
                            <td class="text-center">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary btn-sm rounded-3 px-4 py-2">Editar</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-3 px-4 py-2">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botón flotante -->
        <a href="{{ route('movies.create') }}" class="btn btn-turquoise btn-lg rounded-circle shadow-lg floating-btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </a>
    </div>
@endsection