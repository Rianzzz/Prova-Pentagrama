<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rua;
use App\Models\Bairro;
use App\Services\ViaCepService;

class RuaController extends Controller
{
    protected $viaCepService;

    public function __construct(ViaCepService $viaCepService)
    {
        $this->viaCepService = $viaCepService;
    }

    // Método para exibir a lista de ruas
    public function index()
    {
        $ruas = Rua::with('bairro')->get();
        return view('ruas.index', compact('ruas'));
    }

    // Método para exibir o formulário de criação de uma nova rua
    public function create()
    {
        $bairros = Bairro::all();
        return view('ruas.create', compact('bairros'));
    }

    // Método para armazenar uma nova rua
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'bairro_id' => 'required|exists:bairros,id',
            'cep' => 'nullable|string|max:10'
        ]);

        if (!empty($data['cep'])) {
            $cepData = $this->viaCepService->buscaCep($data['cep']);
            $data['nome'] = $cepData['logradouro'] ?? $data['nome'];
        }

        Rua::create($data);

        return redirect()->route('ruas.index')->with('success', 'Rua criada com sucesso!');
    }

    // Método para exibir os detalhes de uma rua
    public function show($id)
    {
        $rua = Rua::with('bairro')->findOrFail($id);
        return view('ruas.show', compact('rua'));
    }

    // Método para exibir o formulário de edição de uma rua
    public function edit($id)
    {
        $rua = Rua::findOrFail($id);
        $bairros = Bairro::all();
        return view('ruas.edit', compact('rua', 'bairros'));
    }

    // Método para atualizar uma rua
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'bairro_id' => 'required|exists:bairros,id',
            'cep' => 'nullable|string|max:10'
        ]);

        if (!empty($data['cep'])) {
            $cepData = $this->viaCepService->buscaCep($data['cep']);
            $data['nome'] = $cepData['logradouro'] ?? $data['nome'];
        }

        $rua = Rua::findOrFail($id);
        $rua->update($data);

        return redirect()->route('ruas.index')->with('success', 'Rua atualizada com sucesso!');
    }

    // Método para deletar uma rua
    public function destroy($id)
    {
        $rua = Rua::findOrFail($id);
        $rua->delete();

        return redirect()->route('ruas.index')->with('success', 'Rua deletada com sucesso!');
    }

    // Método para buscar o CEP e retornar os dados como JSON
    public function buscarCep(Request $request)
    {
        $cep = $request->input('cep');
        $cepData = $this->viaCepService->buscaCep($cep);
        return response()->json($cepData);
    }

    // Outros métodos do controlador...
}


