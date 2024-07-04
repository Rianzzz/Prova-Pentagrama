<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bairro;
use App\Models\Cidade;

class BairroController extends Controller
{
    // Método para exibir a lista de bairros
    public function index()
    {
        $bairros = Bairro::with('cidade')->get();
        return view('bairros.index', compact('bairros'));
    }

    // Método para exibir o formulário de criação de um novo bairro
    public function create()
    {
        $cidades = Cidade::all();
        return view('bairros.create', compact('cidades'));
    }

    // Método para armazenar um novo bairro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        Bairro::create($validated);

        return redirect()->route('bairros.index')->with('success', 'Bairro criado com sucesso!');
    }

    // Método para exibir os detalhes de um bairro
    public function show($id)
    {
        $bairro = Bairro::with('cidade')->findOrFail($id);
        return view('bairros.show', compact('bairro'));
    }

    // Método para exibir o formulário de edição de um bairro
    public function edit($id)
    {
        $bairro = Bairro::findOrFail($id);
        $cidades = Cidade::all();
        return view('bairros.edit', compact('bairro', 'cidades'));
    }

    // Método para atualizar um bairro
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $bairro = Bairro::findOrFail($id);
        $bairro->update($validated);

        return redirect()->route('bairros.index')->with('success', 'Bairro atualizado com sucesso!');
    }

    // Método para deletar um bairro
    public function destroy($id)
    {
        $bairro = Bairro::findOrFail($id);
        
        // Deletar ruas associadas
        $bairro->ruas()->delete();
    
        $bairro->delete();
    
        return redirect()->route('bairros.index')->with('success', 'Bairro deletado com sucesso!');
    }
}    
