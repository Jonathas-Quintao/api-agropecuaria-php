<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompraProdutos;

class CompraProdutosController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search){
            $compraProdutos = CompraProdutos::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $compraProdutos = CompraProdutos::all();
        }

        return view('compraProdutos', ['compraProdutos' => $compraProdutos, 'search' => $search]);
    }

    public function create($id = null)
    {
        return view('cadastrocompraProdutos', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $compraProduto = new CompraProdutos;
        $compraProduto->nome = $request->nome;
        $compraProduto->quantidade = $request->quantidade;
        $compraProduto->valor = $request->valor;
        $compraProduto->data = $request->data;
        $compraProduto->save();

        return redirect('/compraProdutos');
    }
}
