<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {
            $estoques = Estoque::where([
                ['produto_id', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $estoques = Estoque::all();
        }


        return view('estoque', ['estoques' => $estoques, 'search' => $search]);
    }

    public function create($id = null) {
        return view('cadastroestoque', ['id' => $id]);
    }

    public function store(Request $request) {
        $estoque = new Estoque();
        $estoque->produto_id = $request->produto_id;
        $estoque->quantidade = $request->quantidade;
        $estoque->save();
        return redirect('/estoque');
    }
}
