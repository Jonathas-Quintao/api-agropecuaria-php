<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Endereco;
class FuncionarioController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {
            $funcionarios = Funcionario::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $funcionarios = Funcionario::all();
        }


        return view('/welcome', ['funcionarios' => $funcionarios, 'search' => $search]);
    }

    public function create($id = null) {
        return view('cadastrofuncionarios', ['id' => $id]);
    }

    public function store(Request $request) {

        

        $funcionario = new Funcionario();
        $funcionario->nome = $request->nome;
        $funcionario->cpf = $request->cpf;
        $funcionario->email = $request->email;
        $funcionario->telefone = $request->telefone;
        $funcionario->endereco_id = $request->endereco_id;
        $funcionario->save();
        return redirect('/');
    }
}
