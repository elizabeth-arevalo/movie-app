@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Agregar Película</h1>
        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md
                 border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md
                 border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" required></textarea>
            </div>

            <div class="mb-4">
                <label for="release_year" class="block text-sm font-medium text-gray-700">Año de Lanzamiento</label>
                <input type="number" name="release_year" id="release_year" class="mt-1 block w-full rounded-md
                 border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="director" class="block text-sm font-medium text-gray-700">Director</label>
                <input type="text" name="director" id="director" class="mt-1 block w-full rounded-md
                 border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm" required>
            </div>

            <button type="submit" class="btn btn-turquoise  px-4 py-2 rounded-md hover:bg-cyan-600 transition">
                Guardar
            </button>
        </form>
    </div>
@endsection
