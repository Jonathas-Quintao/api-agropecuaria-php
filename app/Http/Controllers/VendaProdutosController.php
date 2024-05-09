<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendaProdutos;
use App\Models\Produto;
use App\Models\Venda;

class VendaProdutosController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search){
            $vendaProdutos = VendaProdutos::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $vendaProdutos = VendaProdutos::all();
        }

        return view('vendaProdutos', ['vendaProdutos' => $vendaProdutos, 'search' => $search]);
    }

    public function create($id = null)
    {
        return view('cadastrovendaProdutos', ['id' => $id]);
    }

    

    
}
