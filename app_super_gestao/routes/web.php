<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal']);

use App\Http\Controllers\PrincipalController;

use App\Http\Controllers\SobrenosController;

use App\Http\Controllers\ContatoController;

use App\Http\Controllers\ClientesController;

use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\FornecedoresController;

use App\Http\Controllers\TesteController;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function(){

    Route::get('/clientes', [ClientesController::class,'index'])->name('app.clientes');
    Route::get('/fornecedores',[FornecedoresController::class,'index'])->name('app.fornecedores');
    Route::get('/produto', [ProdutoController::class,'index'])->name('app.produtos');

});

Route::get('/teste/{p1}/{p2}',[TesteController::class,'teste'])->name('teste');



Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'"> clique aqui </a> para ir para página inicial';
});