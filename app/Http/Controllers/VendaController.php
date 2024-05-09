<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\VendaProdutos;
use App\Http\Controllers\Log;

class VendaController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {
            $vendas = Venda::where([
                ['cliente_id', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $vendas = Venda::all();
        }

        return view('venda', ['vendas' => $vendas, 'search' => $search]);
    }

    public function create($id = null)
    {
        return view('cadastrovenda', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $venda = new Venda();
    $venda->cliente_id = $request->cliente_id;
    $venda->funcionario_id = $request->funcionario_id;
    $venda->data = $request->data;
    $venda->valor = $request->valor;
    $venda->notaFiscal = $request->notaFiscal;
    $venda->formaPagamento = $request->formaPagamento;
    $venda->status = $request->status;
    $venda->save();

    // Log para verificar se a venda está sendo criada corretamente
    Log::info('Venda criada: ' . json_encode($venda));

    // Agora, insira os produtos vendidos na tabela vendaprodutos
    foreach ($request->produtos as $produto) {
        $produtoVenda = new VendaProdutos();
        $produtoVenda->venda_id = $venda->id;
        $produtoVenda->produto_id = $produto['produto_id'];
        $produtoVenda->quantidade = $produto['quantidade'];
        $produtoVenda->save();
        
        // Log para verificar se os produtos estão sendo inseridos corretamente
        Log::info('Produto vendido: ' . json_encode($produtoVenda));
    }

    return redirect('/vendas');
    }

    public function show($id)
    {
        $dados = Venda::findOrFail($id);
        return view('show', ["dados" => $dados]);
    }
}
