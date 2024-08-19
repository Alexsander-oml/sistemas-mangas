<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::all();
        return view('mangas.index', compact('mangas'));
    }

    public function create()
    {
        return view('mangas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'disponibilidade' => 'required|in:em_estoque,esgotado,sob_encomenda',
        ]);

        Manga::create($request->all());

        return redirect()->route('mangas.index')->with('success', 'Manga criado com sucesso!');
    }

    public function destroy($id)
    {
        $manga = Manga::findOrFail($id);
        $manga->delete();

        return redirect()->route('mangas.index')->with('success', 'Manga excluído com sucesso!');
    }
}
