<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divida;

class DividaController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {
            $dividas = Divida::where([
                ['cliente_id', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $dividas = Divida::all();
        }

        return view('divida', ['dividas' => $dividas, 'search' => $search]);
    }

    public function create($id = null) {
        return view('cadastrodivida', ['id' => $id]);
    }

    public function store(Request $request) {
        $divida = new Divida();
        $divida->cliente_id = $request->cliente_id;
        $divida->valor = $request->valor;
        $divida->data_vencimento = $request->data_vencimento;
        $divida->save();
        return redirect('/dividas');
    }

    public function show($id) {
        $dados = Divida::findOrFail($id);
        return view('show', ["dados" => $dados]);
    }

}
