<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Endereco;

class FornecedorController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {
            $fornecedores = Fornecedor::where([
                ['razaoSocial', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $fornecedores = Fornecedor::all();
        }

        return view('fornecedores', ['fornecedores' => $fornecedores, 'search' => $search]);
    }

    public function create($id = null)
    {
        return view('cadastrofornecedor', ['id' => $id]);
    }

    public function store(Request $request)
    {

        $endereco = Endereco::where([
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'complemento' => $request->complemento
        ])->first();

        if ($endereco) {
            $fornecedor = new Fornecedor();
            $fornecedor->razaoSocial = $request->razaoSocial;
            $fornecedor->cnpj = $request->cnpj;
            $fornecedor->email = $request->email;
            $fornecedor->telefone = $request->telefone;
            $fornecedor->descricao = $request->descricao;
            $fornecedor->endereco()->associate($endereco);
            $fornecedor->save();
            return redirect('/fornecedores');

        }

        

        return redirect('/fornecedores')->with('error', 'Endereço não encontrado!');


    }

    public function show($id)
    {
        $dados = Fornecedor::findOrFail($id);
        return view('show', ["dados" => $dados]);
    }
}
