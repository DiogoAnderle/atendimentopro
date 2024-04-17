<?php


use Illuminate\Support\Facades\Route;

use App\Mail\MensagemTesteEmail;
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

Route::resource('grupo', GrupoController::class)->middleware('verified');

Route::resource('subgrupo', SubgrupoController::class)->middleware('verified');
Route::resource('arvore_conhecimento', ArvoreConhecimentoController::class)->middleware('verified');

Route::resource('user', UserController::class)->middleware('verified');

Route::resource('responsavel', ResponsavelController::class)->middleware('verified');
Route::resource('cliente', ClienteController::class)->middleware('verified');
Route::resource('produto', ProdutoController::class)->middleware('verified');
Route::resource('versao_sistema', VersaoSistemaController::class)->middleware('verified');

Route::patch('produto/', [ProdutoController::class, 'updateAll'])->middleware('verified')->name('produto.update-all');
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