<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Subgrupo;
use Illuminate\Http\Request;

class SubgrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subgrupos = Subgrupo::all()->where('id', '!=',1);


        foreach ($subgrupos as $subgrupo) {
            if ($subgrupo->grupo_id == null){
                $subgrupo->grupo_id=1;
            }
        }
        return view('app.subgrupo.index', compact('subgrupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = Grupo::all()->where('id', '!=',1);
        return view('app.subgrupo.create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $rules = [
            'nome' => 'required|min:3|max:30',
            'user_id' => 'exists:users,id',
            'grupo_id' => 'exists:grupos,id'
        ];
        $feedback = [
            'required' => '* O campo :attribute é obrigatório.',
            'min' => '* O campo :attribute deve conter no mínimo :min caracteres.',
            'max' => '* O campo :attribute deve conter no máximo :max caracteres.',
            'grupo_id.exists' =>'* Selecione um Grupo.'
        ];

        

        Subgrupo::create($request->all());
        
        return redirect()->route('subgrupo.index')->with('sucesso', 'Subgrupo adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subgrupo $subgrupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subgrupo $subgrupo)
    {
        $grupos = Grupo::all()->where('id', '!=',1);
        return view('app.subgrupo.edit', compact('subgrupo', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subgrupo $subgrupo)
    {
        $rules = [
            'nome' => 'required|min:3|max:30',
            'user_id' => 'exists:users,id',
            'grupo_id' => 'exists:grupos,id'
        ];
        $feedback = [
            'required' => '* O campo :attribute é obrigatório.',
            'min' => '* O campo :attribute deve conter no mínimo :min caracteres.',
            'max' => '* O campo :attribute deve conter no máximo :max caracteres.',
            'grupo_id.exists' =>'* Selecione um Grupo.'
        ];

         $request->validate($rules, $feedback);

        $subgrupo->update($request->all());
        
        return redirect()->route('subgrupo.index')->with('sucesso', 'Subgrupo atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subgrupo $subgrupo)
    {
        $subgrupo->delete();

        return redirect()->route('subgrupo.index')->with('sucesso', 'Subgrupo removido com sucesso.');
    }
}
