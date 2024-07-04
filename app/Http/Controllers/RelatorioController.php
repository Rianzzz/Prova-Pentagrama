<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Bairro;
use App\Models\Rua;
use App\Services\ViaCepService;

class RelatorioController extends Controller
{
    protected $viaCepService;

    public function __construct(ViaCepService $viaCepService)
    {
        $this->viaCepService = $viaCepService;
    }

    public function index(Request $request)
    {
        $cidades = Cidade::with(['bairros', 'bairros.ruas'])
            ->when($request->cidade, function ($query, $cidade) {
                return $query->where('nome', 'like', '%' . $cidade . '%');
            })
            ->when($request->bairro, function ($query, $bairro) {
                return $query->whereHas('bairros', function ($q) use ($bairro) {
                    $q->where('nome', 'like', '%' . $bairro . '%');
                });
            })
            ->when($request->rua, function ($query, $rua) {
                return $query->whereHas('bairros.ruas', function ($q) use ($rua) {
                    $q->where('nome', 'like', '%' . $rua . '%');
                });
            })
            ->when($request->data_inicio, function ($query, $data_inicio) {
                return $query->where('data_fundacao', '>=', $data_inicio);
            })
            ->when($request->data_fim, function ($query, $data_fim) {
                return $query->where('data_fundacao', '<=', $data_fim);
            })
            ->get();

        return view('relatorios.index', compact('cidades'));
    }

    public function buscarCep(Request $request)
    {
        $cep = $request->input('cep');
        $cepData = $this->viaCepService->buscaCep($cep);
        return response()->json($cepData);
    }
}

