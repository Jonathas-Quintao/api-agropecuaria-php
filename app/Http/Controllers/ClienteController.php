<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;

class ClienteController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search){
            $clientes = Cliente::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $clientes = Cliente::all();
        }

        
        return view('clientes', ['clientes' => $clientes, 'search' => $search]);
    }

    public function create($id = null)
    {
        return view('cadastroclientes', ['id' => $id]);
    }

    public function store(Request $request){
        
            $cliente = new Cliente;
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->email = $request->email;
            $cliente->telefone = $request->telefone;
            $cliente->endereco_id = $request->endereco_id;
            $cliente->save();

            return redirect('/clientes');
    }

    public function show($id)
    {
        $dados = Cliente::findOrFail($id);
        return view("show", ["dados" => $dados]);
    }

}
