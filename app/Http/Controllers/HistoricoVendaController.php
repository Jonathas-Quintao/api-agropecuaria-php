<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricoVendaController extends Controller
{
    public function index() {
        return view('historicovenda');
    }

    public function create($id = null) {
        return view('cadastrovenda', ['id' => $id]);
    }

    public function store(Request $request) {
        $venda = new Venda();
        $venda->cliente_id = $request->cliente_id;
        $venda->funcionario_id = $request->funcionario_id;
        $venda->data_venda = $request->data_venda;
        $venda->valor_total = $request->valor_total;
        $venda->save();
        return redirect('/vendas');
    }
}
