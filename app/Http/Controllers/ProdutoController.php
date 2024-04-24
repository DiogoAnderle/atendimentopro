<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\VersaoSistema;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $produtos = DB::select(
        //     'SELECT P.*, C.NOMEFANTASIA, C.CIDADE, VS.VERSAO, U.FIRSTNAME
        //              FROM PRODUTOS P 
        //              JOIN CLIENTES C ON ( C.ID = P.CLIENTE_ID )
        //              JOIN VERSOES_SISTEMA VS ON ( VS.ID = P.VERSAO_SISTEMA_ID)
        //              JOIN USERS U ON ( U.ID = P.USER_ID)
        //              WHERE (C.STATUS = "A") '
        // );

        $produtos = Produto::whereHas('cliente', function ($q) {
            $q->where('status', 'A');
        })->get();

        return view('app.produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $clientes = DB::select(
        //     'SELECT * FROM CLIENTES C 
        //      WHERE NOT EXISTS(SELECT CLIENTE_ID FROM PRODUTOS P WHERE P.CLIENTE_ID = C.ID)
        //      AND C.STATUS = "A"
        //      ORDER BY C.NOMEFANTASIA'
        // );
        $clientes = Cliente::whereDoesntHave('produto') // Verifica se não existe nenhum produto vinculado
            ->where('status', 'A') // Filtra clientes com status "A"
            ->orderBy('nomefantasia') // Ordena por nomefantasia
            ->get();

        $versoes_sistema = VersaoSistema::all()->sortBy('versao');

        return view('app.produto.create', compact('clientes', 'versoes_sistema'));
    }

    /*
      Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "cliente_id" => "exists:clientes,id",
            "versao_sistema_id" => "exists:versoes_sistema,id",

        ];
        $feedback = [
            "cliente_id.exists" => "* Selecione um cliente para continuar.",
            "versao_sistema_id.exists" => "* Selecione uma versão apra continuar.",
            'cliente_id.unique' => '* Produto já cadastrado para esse cliente.',
        ];

        if (!isset($request["produtos_cliente"])) {
            $request["produtos_cliente"] = [""];
        }

        $versaoSistema = VersaoSistema::where("id", $request->get("versao_sistema_id"))->first();

        if ($versaoSistema->ultima_versao == 1) {

            $request["status"] = "Atualizado";
        } else {
            $request["status"] = "Desatualizado";
        }

        $request->validate($rules, $feedback);


        Produto::create($request->all());

        return redirect()->route('produto.index')->with('sucesso', 'Produto cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $clientes = Cliente::all()->sortBy('nomeFantasia');
        $versoes_sistema = VersaoSistema::all()->sortBy('versao');
        return view('app.produto.edit', compact('produto', 'clientes', 'versoes_sistema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $rules = [
            "cliente_id" => "exists:clientes,id",
            "versao_sistema_id" => "exists:versoes_sistema,id",
        ];
        $feedback = [
            "cliente_id.exists" => "* Selecione um cliente para continuar.",
            "versao_sistema_id.exists" => "* Selecione uma versão apra continuar.",
        ];


        $request->validate($rules, $feedback);

        $versaoSistema = VersaoSistema::where("id", $request->get("versao_sistema_id"))->first();

        $versaoSistema->ultima_versao == 1 ? $request["status"] = "Atualizado" : $request["status"] = "Desatualizado";

        $produto->update($request->all());

        return redirect()->route('produto.index')->with('sucesso', 'Produto Atualizado com sucesso.');
    }

    /**
     * Set Desatualizado on Status on all products.
     */
    public function updateAll(Request $request)
    {
        Produto::query()->update(['status' => $request->status]);
        return redirect()->route('produto.index')->with('sucesso', 'Todos os clientes marcados como Desatualizado.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index')->with('sucesso', 'Produto removido com sucesso.');
    }
}
