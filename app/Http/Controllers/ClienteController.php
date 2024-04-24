<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('app.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'cnpj' => ['required', 'string', 'min:18', 'max:18', 'unique:clientes'],
            'razaoSocial' => ['required', 'min:3', 'max:200'],
            'nomeFantasia' => ['required', 'min:3', 'max:50'],
            'cep' => ['required', 'min:8', 'max:8'],
            'logradouro' => ['required', 'min:3', 'max:100'],
            'bairro' => ['required', 'min:3', 'max:100'],
            'cidade' => ['required', 'min:3', 'max:100'],
            'uf' => ['required', 'min:2', 'max:2'],
        ];

        $feedback = [
            'cnpj.required' => '* O campo CNPJ é obrigatório.',
            'cnpj.min' => '* O campo CNPJ deve ter no mínimo :min caracteres.',
            'cnpj.max' => '* O campo CNPJ deve ter no máximo :max caracteres.',
            'cnpj.unique' => '* CNPJ já cadastrado para outro cliente.',

            'razaoSocial.required' => '* O campo Razão Social é obrigatório.',
            'razaoSocial.min' => '* O campo Razão Social deve ter no mínimo :min caracteres.',
            'razaoSocial.max' => '* O campo Razão Social deve ter no máximo :max caracteres.',

            'nomeFantasia.required' => '* O campo Nome Fantasia é obrigatório.',
            'nomeFantasia.min' => '* O campo Nome Fantasia deve ter no mínimo :min caracteres.',
            'nomeFantasia.max' => '* O campo Nome Fantasia deve ter no máximo :max caracteres.',

            'cep.required' => '* O campo CEP é obrigatório.',
            'cep.min' => '* O campo CEP deve ter no mínimo :min caracteres.',
            'cep.max' => '* O campo CEP deve ter no máximo :max caracteres.',


            'logradouro.required' => '* O campo Logradouro é obrigatório.',
            'logradouro.min' => '* O campo Logradouro deve ter no mínimo :min caracteres.',
            'logradouro.max' => '* O campo Logradouro deve ter no máximo :max caracteres.',

            'bairro.required' => '* O campo Bairro é obrigatório.',
            'bairro.min' => '* O campo Bairro deve ter no mínimo :min caracteres.',
            'bairro.max' => '* O campo Bairro deve ter no máximo :max caracteres.',

            'cidade.required' => '* O campo Cidade é obrigatório.',
            'cidade.min' => '* O campo Cidade deve ter no mínimo :min caracteres.',
            'cidade.max' => '* O campo Cidade deve ter no máximo :max caracteres.',

            'uf.required' => '* O campo UF(Unidade Federativa) é obrigatório.',
            'uf.min' => '* O campo UF(Unidade Federativa) deve ter no mínimo :min caracteres.',
            'uf.max' => '* O campo UF(Unidade Federativa) deve ter no máximo :max caracteres.',

        ];

        $request->validate($rules, $feedback);

        Cliente::create($request->all());

        return redirect()->route('cliente.create')->with('sucesso', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $produto = Produto::where('cliente_id', $cliente->id)->first();
        return view('app.cliente.details', compact('cliente', 'produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('app.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $cliente = Cliente::find($id);

        if (null != ($request->get('cnpj'))) {
            $clienteTemp = Cliente::where('cnpj', $request->get('cnpj'))->first();
            if ($clienteTemp->id == $cliente->id) {
                $rules = [
                    'cnpj' => ['required', 'string', 'min:18', 'max:18',],
                    'razaoSocial' => ['required', 'min:3', 'max:200'],
                    'nomeFantasia' => ['required', 'min:3', 'max:50'],
                    'cep' => ['required', 'min:8', 'max:8'],
                    'logradouro' => ['required', 'min:3', 'max:100'],
                    'bairro' => ['required', 'min:3', 'max:100'],
                    'cidade' => ['required', 'min:3', 'max:100'],
                    'uf' => ['required', 'min:2', 'max:2'],
                ];
            } else {
                $rules = [
                    'cnpj' => ['required', 'string', 'min:18', 'max:18', 'unique:clientes'],
                    'razaoSocial' => ['required', 'min:3', 'max:200'],
                    'nomeFantasia' => ['required', 'min:3', 'max:50'],
                    'cep' => ['required', 'min:8', 'max:8'],
                    'logradouro' => ['required', 'min:3', 'max:100'],
                    'bairro' => ['required', 'min:3', 'max:100'],
                    'cidade' => ['required', 'min:3', 'max:100'],
                    'uf' => ['required', 'min:2', 'max:2'],
                ];
            }
        }


        $feedback = [
            'cnpj.required' => '* O campo CNPJ é obrigatório.',
            'cnpj.min' => '* O campo CNPJ deve ter no mínimo :min caracteres.',
            'cnpj.max' => '* O campo CNPJ deve ter no máximo :max caracteres.',
            'cnpj.unique' => '* CNPJ já cadastrado para outro cliente.',

            'razaoSocial.required' => '* O campo Razão Social é obrigatório.',
            'razaoSocial.min' => '* O campo Razão Social deve ter no mínimo :min caracteres.',
            'razaoSocial.max' => '* O campo Razão Social deve ter no máximo :max caracteres.',

            'nomeFantasia.required' => '* O campo Nome Fantasia é obrigatório.',
            'nomeFantasia.min' => '* O campo Nome Fantasia deve ter no mínimo :min caracteres.',
            'nomeFantasia.max' => '* O campo Nome Fantasia deve ter no máximo :max caracteres.',

            'cep.required' => '* O campo CEP é obrigatório.',
            'cep.min' => '* O campo CEP deve ter no mínimo :min caracteres.',
            'cep.max' => '* O campo CEP deve ter no máximo :max caracteres.',


            'logradouro.required' => '* O campo Logradouro é obrigatório.',
            'logradouro.min' => '* O campo Logradouro deve ter no mínimo :min caracteres.',
            'logradouro.max' => '* O campo Logradouro deve ter no máximo :max caracteres.',

            'bairro.required' => '* O campo Bairro é obrigatório.',
            'bairro.min' => '* O campo Bairro deve ter no mínimo :min caracteres.',
            'bairro.max' => '* O campo Bairro deve ter no máximo :max caracteres.',

            'cidade.required' => '* O campo Cidade é obrigatório.',
            'cidade.min' => '* O campo Cidade deve ter no mínimo :min caracteres.',
            'cidade.max' => '* O campo Cidade deve ter no máximo :max caracteres.',

            'uf.required' => '* O campo UF(Unidade Federativa) é obrigatório.',
            'uf.min' => '* O campo UF(Unidade Federativa) deve ter no mínimo :min caracteres.',
            'uf.max' => '* O campo UF(Unidade Federativa) deve ter no máximo :max caracteres.',

        ];

        $request->validate($rules, $feedback);

        $cliente->update($request->all());

        return redirect()->route('cliente.index')->with('sucesso', 'Cliente atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')->with('sucesso', 'Cliente removido com sucesso.');
    }
}
