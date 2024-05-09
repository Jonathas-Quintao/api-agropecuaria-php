<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerdaController extends Controller
{
    public function index() {
        return view('perda');
    }

    public function create($id = null) {
        return view('cadastroperda', ['id' => $id]);
    }

    public function store(Request $request) {
        $perda = new Perda();
        $perda->produto_id = $request->produto_id;
        $perda->quantidade = $request->quantidade;
        $perda->save();
        return redirect('/perdas');
    }
}
