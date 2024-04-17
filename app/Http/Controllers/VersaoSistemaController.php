<?php

namespace App\Http\Controllers;

use App\Models\VersaoSistema;
use App\Models\Produto;
use Illuminate\Http\Request;

class VersaoSistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $versoesSistema = VersaoSistema::all()->sortBy('versao');
        return view('app.versao_sistema.index', compact('versoesSistema'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.versao_sistema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'versao' => ['required', 'min:8', 'max:8', 'unique:versoes_sistema'],
            'descricao' => ['required', 'min:3'],
        ];
        $feedback = [
            'versao.required' => '* O campo versão é obrigatório.',
            'versao.min' => '* O campo versão deve ter no mínimo :min caracteres.',
            'versao.max' => '* O campo versão deve ter no máximo :max caracteres.',
            'versao.unique' => '* Versão já cadastrada.',
            'descricao.required' => '* O campo descrição é obrigatório.',
            'descricao.min' => '* O campo descrição deve ter no mínimo :min caracteres.',
        ];

        $request->validate($rules, $feedback);

        if ($request->has("ultima_versao")) {

            VersaoSistema::query()->update(['ultima_versao' => '0']);
            Produto::query()->update(['status' => 'Desatualizado']);

            $request["ultima_versao"] = "1";
        }

        VersaoSistema::create($request->all());

        return redirect()->route('versao_sistema.index')->with('sucesso', 'Versão cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VersaoSistema $versaoSistema)
    {
        return view('app.versao_sistema.show', compact('versaoSistema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VersaoSistema $versaoSistema)
    {
        return view('app.versao_sistema.edit', compact('versaoSistema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VersaoSistema $versaoSistema)
    {
        $rules = [
            'versao' => ['required', 'min:8', 'max:8', 'unique:versoes_sistema,versao,' . $versaoSistema->id],
            'descricao' => ['required', 'min:3'],
        ];
        $feedback = [
            'versao.required' => '* O campo versão é obrigatório.',
            'versao.min' => '* O campo versão deve ter no mínimo :min caracteres.',
            'versao.max' => '* O campo versão deve ter no máximo :max caracteres.',
            'versao.unique' => '* Versão já cadastrada.',
            'descricao.required' => '* O campo descrição é obrigatório.',
            'descricao.min' => '* O campo descrição deve ter no mínimo :min caracteres.',
        ];

        $request->validate($rules, $feedback);

        if ($request->has("ultima_versao")) {

            VersaoSistema::query()->update(['ultima_versao' => '0']);
            Produto::query()->update(['status' => 'Desatualizado']);

            $request["ultima_versao"] = "1";
        }

        $versaoSistema->update($request->all());

        return redirect()->route('versao_sistema.index')->with('sucesso', 'Versão atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VersaoSistema $versaoSistema)
    {
        $versaoSistema->delete();

        return redirect()->route('versao_sistema.index')->with('sucesso', 'Versão removida com sucesso.');
    }
}
