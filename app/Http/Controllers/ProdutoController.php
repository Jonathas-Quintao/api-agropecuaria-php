<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {
            $produtos = Produto::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $produtos = Produto::all();
        }
        return view('produto', ['produtos' => $produtos, 'search' => $search]);
    }

    public function create($id = null) {
        return view('cadastroproduto', ['id'=> $id]);
    }

    public function store(Request $request) {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->tamanho = $request->tamanho;
        $produto->lote = $request->lote;
        $produto->validade = $request->validade;
        $produto->quantidade = $request->quantidade;
        $produto->estoqueMinimo = $request->estoqueMinimo;
        $produto->estoqueMaximo = $request->estoqueMaximo;
        $produto->valorReposicao = $request->valorReposicao;
        $produto->preco = $request->preco;
        $produto->imagem = $request->imagem;
        $produto->save();
        return redirect('/produto');
    }

    public function show($id) {
        $dados = Produto::findOrFail($id);
        return view('show',[ "dados" => $dados]);
    }
}
