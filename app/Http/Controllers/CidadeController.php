<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    // Método para exibir a lista de cidades
    public function index()
    {
        $cidades = Cidade::all();
        return view('cidades.index', compact('cidades'));
    }

    // Método para exibir o formulário de criação de uma nova cidade
    public function create()
    {
        return view('cidades.create');
    }

    // Método para armazenar uma nova cidade
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'data_fundacao' => 'required|date',
        ]);

        Cidade::create($validated);

        return redirect()->route('cidades.index')->with('success', 'Cidade criada com sucesso!');
    }

    // Método para exibir os detalhes de uma cidade
    public function show($id)
    {
        $cidade = Cidade::findOrFail($id);
        return view('cidades.show', compact('cidade'));
    }

    // Método para exibir o formulário de edição de uma cidade
    public function edit($id)
    {
        $cidade = Cidade::findOrFail($id);
        return view('cidades.edit', compact('cidade'));
    }

    // Método para atualizar uma cidade
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'data_fundacao' => 'required|date',
        ]);

        $cidade = Cidade::findOrFail($id);
        $cidade->update($validated);

        return redirect()->route('cidades.index')->with('success', 'Cidade atualizada com sucesso!');
    }

    // Método para deletar uma cidade
    public function destroy($id)
    {
        
    $cidade = Cidade::findOrFail($id);
    
    // Deletar bairros associados
    $cidade->bairros()->delete();

    $cidade->delete();

    return redirect()->route('cidades.index')->with('success', 'Cidade deletada com sucesso!');
    }

}
