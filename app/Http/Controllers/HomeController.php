<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Responsavel;
use Illuminate\Http\Request;
use App\Models\ArvoreConhecimento;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conhecimentos = ArvoreConhecimento::all()->count();
        $users = User::all()->count();
        $responsaveis = Responsavel::all()->count();
        $clientes = Cliente::all()->count();
        $produtos = Produto::all()->count();
        return view('app.home', compact('conhecimentos', 'users', 'responsaveis', 'clientes', 'produtos'));
    }
}