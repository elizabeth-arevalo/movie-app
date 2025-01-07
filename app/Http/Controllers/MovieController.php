<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'release_year' => 'required|digits:4',
            'director' => 'required|max:255',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Película agregada con éxito.');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'release_year' => 'required|digits:4',
            'director' => 'required|max:255',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return redirect()->route('movies.index');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index');
    }
}
