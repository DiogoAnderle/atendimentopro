<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsaveis = Responsavel::all();
        return view('app.responsavel.index', compact('responsaveis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.responsavel.create');
    }

    /**
     * Store a newly created resource in storawge.
     */
    public function store(Request $request)
    {
        $rules = [
            'firstName' => ['required', 'min:3', 'max:15'],
            'lastName' => ['required', 'min:3', 'max:100'],
            'telefone' => ['max:15'],
            'whatsapp' => ['max:15'],
        ];

        $feedback = [
            'firstName.required' => '* O campo nome é obrigatório.',
            'firstName.min' => '* O campo nome deve ter no mínimo :min caracteres.',
            'firstName.max' => '* O campo nome deve ter no máximo :max caracteres.',
            'lastName.required' => '* O campo sobrenome é obrigatório.',
            'lastName.min' => '* O campo sobrenome deve ter no mínimo :min caracteres.',
            'lastName.max' => '* O campo sobrenome deve ter no máximo :max caracteres.',
            'telefone.max' => '* O campo telefone deve ter no máximo :max caracteres.',
            'whatsapp.max' => '* O campo whatsapp deve ter no máximo :max caracteres.',
        ];


        $request->validate($rules, $feedback);

        Responsavel::create($request->all());

        return redirect()->route('responsavel.index')->with('sucesso', 'Responsável cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsavel $responsavel)
    {
        return view('app.responsavel.show', compact('responsavel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsavel $responsavel)
    {
        return view('app.responsavel.edit', compact('responsavel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsavel $responsavel)
    {
        $rules = [
            'firstName' => ['required', 'min:3', 'max:15'],
            'lastName' => ['required', 'min:3', 'max:100'],
        ];

        $feedback = [
            'firstName.required' => '* O campo nome é obrigatório.',
            'firstName.min' => '* O campo nome deve ter no mínimo :min caracteres.',
            'firstName.max' => '* O campo nome deve ter no máximo :max caracteres.',
            'lastName.required' => '* O campo sobrenome é obrigatório.',
            'lastName.min' => '* O campo sobrenome deve ter no mínimo :min caracteres.',
            'lastName.max' => '* O campo sobrenome deve ter no máximo :max caracteres.',
        ];


        $request->validate($rules, $feedback);

        $responsavel->update($request->all());

        return redirect()->route('responsavel.index')->with('sucesso', 'Responsável atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsavel $responsavel)
    {
        $responsavel->delete();

        return redirect()->route('responsavel.index')->with('sucesso', 'Responsável removido com sucesso.');
    }
}
