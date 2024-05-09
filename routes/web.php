<?php

use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DividaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\PerdaController;

Route::get('/csrf-token', function() {
    return csrf_token();
});

Route::get('/',[FuncionarioController::class, 'index']  );


Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);


Route::get('/fornecedores', [FornecedorController::class,'index']);
Route::get('/fornecedores/{id}', [FornecedorController::class,'show']);

Route::get('/produto', [ProdutoController::class, 'index']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);

Route::get('/endereco', [EnderecoController::class, 'index']);
Route::get('/endereco/{id}', [EnderecoController::class, 'show']);


Route::get('/vendas',[VendaController::class, 'index']);
Route::get('/vendas',[VendaController::class, 'show']);
Route::post('/vendas', [VendaController::class, 'store']);

Route::get('/dividas', [DividaController::class, 'index']);
Route::get('/dividas', [DividaController::class, 'show']);
Route::post('/dividas', [DividaController::class, 'store']);

Route::get('/cadastrofuncionarios/{id?}',[FuncionarioController::class, 'create']);
Route::post('/cadastrofuncionarios', [FuncionarioController::class, 'store']);

Route::get('/cadastroclientes/{id?}', [ClienteController::class, 'create']);
Route::post('/cadastroclientes', [ClienteController::class, 'store']);

Route::get('/cadastroestoque/{id?}', [ProdutoController::class, 'create']);
Route::post('/cadastroestoque', [ProdutoController::class, 'store']);

Route::get('/cadastrofornecedor/{id?}', [FornecedorController::class, 'create']);
Route::post('/cadastrofornecedor', [FornecedorController::class, 'store']);

Route::get('/cadastroproduto/{id?}', [ProdutoController::class, 'create']);
Route::post('/cadastroproduto', [ProdutoController::class, 'store']);

Route::get('/cadastroperdas/{id?}',[PerdaController::class, 'create']);
Route::post('/cadastroperdas', [PerdaController::class, 'store']);

Route::get('/cadastroendereco/{id?}',[EnderecoController::class, 'create']);
Route::post('/cadastroendereco', [EnderecoController::class, 'store']);

Route::get('/carrinho/{id?}', function () {

    return view('carrinho');
});

Route::post('/carrinho', [VendaController::class, 'store']);

Route::get('/historicocompras/{id?}', function () {

    return view('historicocompras');
});
Route::post('/historicocompras', [VendaController::class, 'store']);

Route::get('/finalizarcompras/{id?}', function () {

    return view('finalizarcompras');
});

Route::get('/dividas', [DividaController::class, 'index']);
Route::post('/dividas', [DividaController::class, 'store']);
