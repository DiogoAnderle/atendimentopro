<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all()->where('id', '!=', 1);
        return view('app.grupo.index', compact('grupos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|min:3|max:30',
            'user_id' => 'exists:users,id'
        ];
        $feedback = [
            'required' => '* O campo :attribute é obrigatório.',
            'min' => '* O campo :attribute deve conter no mínimo :min caracteres.',
            'max' => '* O campo :attribute deve conter no máximo :max caracteres.'
        ];

        $request->validate($rules, $feedback);

        Grupo::create($request->all());

        return redirect()->route('grupo.index')->with('sucesso', 'Grupo adicionado com sucesso.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        return view('app.grupo.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $rules = [
            'nome' => 'required|min:3|max:30',
            'user_id' => 'exists:users,id'
        ];
        $feedback = [
            'required' => '* O campo :attribute é obrigatório.',
            'min' => '* O campo :attribute deve conter no mínimo :min caracteres.',
            'max' => '* O campo :attribute deve conter no máximo :max caracteres.'
        ];

        $request->validate($rules, $feedback);

        $grupo->update($request->all());

        return redirect()->route('grupo.index')->with('sucesso', 'Grupo atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupo.index')->with('sucesso', 'Grupo removido com sucesso.');
    }
}