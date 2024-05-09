<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;

class EnderecoController
{
    public function index() {
        $search = request('search');

        if ($search) {
            $enderecos = Endereco::where('logradouro', 'like', '%'.$search.'%')->get();
        } else {
            $enderecos = Endereco::all();
        }
        return view('endereco', ['enderecos' => $enderecos, 'search' => $search]);
    }

    public function create($id = null) {
        return view('cadastroendereco', ['id' => $id]);
    }

    public function store(Request $request){
        $endereco = new Endereco();
        $endereco->logradouro = $request->logradouro;
        $endereco->numero = $request->numero;
        $endereco->cidade = $request->cidade;
        $endereco->bairro = $request->bairro;
        $endereco->estado = $request->estado;
        $endereco->cep = $request->cep;
        $endereco->complemento = $request->complemento;
        $endereco->save();

        return redirect('/endereco');
    }
}
