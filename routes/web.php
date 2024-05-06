<?php


use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubgrupoController;
use App\Http\Controllers\ArvoreConhecimentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ResponsavelClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VersaoSistemaController;


Route::get('/', [SiteController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

Route::resource('grupo', GrupoController::class)->middleware('verified');

Route::resource('subgrupo', SubgrupoController::class)->middleware('verified');
Route::resource('arvore_conhecimento', ArvoreConhecimentoController::class)->middleware('verified');

Route::get('carrega_subgrupos', 'App\Http\Controllers\ArvoreConhecimentoController@carregaSubgrupos')->middleware('verified')->name('carrega_subgrupos');

Route::resource('user', UserController::class)->middleware('verified');

Route::resource('responsavel', ResponsavelController::class)->middleware('verified');
Route::resource('cliente', ClienteController::class)->middleware('verified');
Route::resource('produto', ProdutoController::class)->middleware('verified');
Route::resource('versao_sistema', VersaoSistemaController::class)->middleware('verified');

//Route::resource('responsavel-cliente', ResponsavelClienteController::class)->middleware('verified');

Route::get('responsavel-cliente/create/{cliente}', [ResponsavelClienteController::class, 'create'])
    ->name('responsavel-cliente.create')
    ->middleware('verified');

Route::post('responsavel-cliente/store/{cliente}', [ResponsavelClienteController::class, 'store'])
    ->name('responsavel-cliente.store')
    ->middleware('verified');

Route::delete('responsavel-cliente/delete/{responsavel_clientes}', [ResponsavelClienteController::class, 'destroy'])
    ->name('responsavel-cliente.destroy')
    ->middleware('verified');