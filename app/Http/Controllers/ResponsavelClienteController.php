<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use App\Models\ResponsavelCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ResponsavelClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $cliente)
    {
        $responsaveis = Responsavel::all();
        return view('app.responsavel-cliente.create', compact('cliente', 'responsaveis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cliente $cliente)
    {
        $responsavelCliente = new ResponsavelCliente();
        $responsavelClienteBanco = $responsavelCliente->where("cliente_id", $cliente->id)->where('responsavel_id', $request->get("responsavel_id"))->first();

        if ($responsavelClienteBanco != null) {
            return redirect()
                ->route('responsavel-cliente.create', compact('cliente', 'responsavelCliente'))
                ->with('erro', 'Não é possível incluir um responsável que já esteja vinculado.');
        } else {
            $rules = [
                'responsavel_id' => 'exists:responsaveis,id'
            ];

            $feedback = [
                'responsavel_id.exists' => 'Selecione um responsável antes de incluir.'
            ];

            $request->validate($rules, $feedback);

            $responsavelCliente->cliente_id = $cliente->id;
            $responsavelCliente->responsavel_id = $request->get("responsavel_id");
            $responsavelCliente->save();

            return redirect()->route('responsavel-cliente.create', compact('cliente', 'responsavelCliente'))
                ->with('sucesso', 'Responsável vinculado com sucesso.');

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(ResponsavelCliente $responsavelCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResponsavelCliente $responsavelCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResponsavelCliente $responsavelCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $responsavelCliente = ResponsavelCliente::find($id);
        $cliente = Cliente::find($request->get('cliente_id'));
        $responsavelCliente->delete();
        return redirect()->route('responsavel-cliente.create', compact('cliente', 'responsavelCliente'))->with('sucesso', 'Responsável removido com sucesso.');
    }
}
