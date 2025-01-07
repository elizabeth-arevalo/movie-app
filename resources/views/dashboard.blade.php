<x-app-layout class="bg-blue-900">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-turquoise leading-tight">
            {{ __('Bienvenid@, ' . Auth::user()->name) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tabs Navigation -->
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="bg-black inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-900 font-semibold" href="#movies-tab" id="movies-tab-button">
                        {{ __('Lista de Peliculas') }}
                    </a>
                </li>
                <li class="mr-1">
                    <a class="bg-black inline-block py-2 px-4 text-turquoise font-semibold hover:text-gray-900" href="#info-tab" id="info-tab-button">
                        {{ __('Administrador') }}
                    </a>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div id="movies-tab" class="mt-4">
                <div class="bg-blue-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold text-turquoise">{{ __('Lista de Peliculas') }}</h3>
                        <p>{{ __('Aquí podrás ver un listado de las peliculas.') }}</p>
                        <!-- Movies content will be added here -->
                        <div class="table-responsive d-flex justify-content-center">
                            <table class="table table-striped table-bordered table-hover shadow-lg rounded-lg" style="max-width: 90%; width: 100%;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Año de estreno</th>
                                        <th>Director</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $movie)
                                        <tr>
                                            <td class="table-text">{{ $movie->title }}</td>
                                            <td class="table-text">{{ $movie->description }}</td>
                                            <td class="table-text">{{ $movie->release_year }}</td>
                                            <td class="table-text">{{ $movie->director }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="info-tab" class="hidden mt-4">
                <div class="bg-blue-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold dark:text-gray-100">{{ __('Administrador') }}</h3>
                        <p class="dark:text-gray-100">{{ __('Para consultar o editar peliculas, da clic aquí.') }}</p>
                        <div class="d-flex justify-content-center mb-4">
                            <a href="{{ route('movies.index') }}" class="btn btn-turquoise btn-lg rounded-3 px-6 py-3">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button 
            class="fixed bottom-5 right-5 bg-blue-900 text-white hover:bg-turquoise rounded-full p-4 shadow-lg flex items-center justify-center transition duration-300 ease-in-out"  
            onclick="window.location.href='{{ route('movies.create') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
    </button>


    <!-- JavaScript for Tabs -->
    <script>
        const tabs = document.querySelectorAll('[id$="-tab-button"]');
        const contents = document.querySelectorAll('[id$="-tab"]');

        tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                tabs.forEach(t => t.classList.remove('border-l', 'border-t', 'border-r', 'rounded-t', 'font-semibold'));
                contents.forEach(content => content.classList.add('hidden'));
                
                tab.classList.add('border-l', 'border-t', 'border-r', 'rounded-t', 'font-semibold');
                document.querySelector(tab.getAttribute('href')).classList.remove('hidden');
            });
        });

        // function addMovie() {
        //     alert('Add Movie button clicked!');
        // }
    </script>

    <style>
        .table-text {
            color: black;
        }
        .bg-blue-900 {
            background-color: #005f73;
        }

        .hover\:bg-turquoise:hover {
            background-color: #0a9396;
        }

        .text-white {
            color: #ffffff;
        }

        .rounded-full {
            border-radius: 50%;
        }

        .shadow-lg {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .fixed {
            position: fixed;
        }

        .bottom-5 {
            bottom: 1.25rem; /* 20px */
        }

        .right-5 {
            right: 1.25rem; /* 20px */
        }

        .transition {
            transition: all 0.3s ease-in-out;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }
    </style>
</x-app-layout>
