<?php

namespace App\Http\Controllers;

use App\Models\ArvoreConhecimento;
use App\Models\Grupo;
use App\Models\Subgrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ArvoreConhecimentoController extends Controller
{
    public function __construct(Grupo $grupo, Subgrupo $subgrupo)
    {
        $this->grupo = $grupo;
        $this->subgrupo = $subgrupo;
    }
    public function index()
    {
        $arvoreConhecimentos = ArvoreConhecimento::all();
        foreach ($arvoreConhecimentos as $arvoreConhecimento) {
            if ($arvoreConhecimento->subgrupo_id == null) {
                $arvoreConhecimento->subgrupo_id = 1;
            }
            if ($arvoreConhecimento->grupo_id == null) {
                $arvoreConhecimento->grupo_id = 1;
            }

        }

        return view('app.arvore_conhecimento.index', compact('arvoreConhecimentos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = $this->grupo->where('id', '>', 1)->orderBy('nome', 'ASC')->get();
        $subgrupos = $this->subgrupo->Where('id', '=', 0)->orderBy('nome', 'ASC')->get();

        return view('app.arvore_conhecimento.create', compact('grupos', 'subgrupos'));
    }

    public function carregaSubgrupos(Request $request)
    {
        $dataForm = $request->all();
        $grupo_id = $dataForm['grupo_id'];
        $subgrupos = $this->subgrupo->Where('grupo_id', '=', $grupo_id)->where('id', '>', 1)->orderBy('nome', 'ASC')->get();
        return view('app.arvore_conhecimento.subgrupos_ajax', compact('subgrupos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'assunto' => 'required|min:3|max:255',
            'user_id' => 'exists:users,id',
            'grupo_id' => 'exists:grupos,id',
            'subgrupo_id' => 'exists:subgrupos,id',
            'descricao' => 'required|min:3',
        ];
        $feedback = [
            'required' => '* O campo :attribute é obrigatório.',
            'min' => '* O campo :attribute deve conter no mínimo :min caracteres.',
            'max' => '* O campo :attribute deve conter no máximo :max caracteres.',
            'grupo_id.exists' => '* Selecione um Grupo.',
            'subgrupo_id.exists' => '* Selecione um Subgrupo.',
        ];

        $request->validate($rules, $feedback);

        $arvore = $request->all();
        $arvore['descricao'] = $request->descricao;

        $dom = new \DOMDocument();
        $dom->loadHTML($arvore['descricao'], 9);

        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time() . $key . ".png";
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $descricao = $dom->saveHTML();


        if ($request->image) {
            $arvore['image'] = $request->image->store('arvore_conhecimento');

        }
        ;

        ArvoreConhecimento::create($arvore);


        return redirect()->route('arvore_conhecimento.index')->with('sucesso', 'Conhecimento adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArvoreConhecimento $arvoreConhecimento)
    {
        return view('app.arvore_conhecimento.details', compact('arvoreConhecimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArvoreConhecimento $arvoreConhecimento)
    {
        $grupos = Grupo::all()
            ->where('id', '!=', 1);

        $subgrupos = Subgrupo::all()
            ->where('id', '!=', 1);

        return view('app.arvore_conhecimento.edit', ['arvoreConhecimento' => $arvoreConhecimento, 'grupos' => $grupos, 'subgrupos' => $subgrupos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArvoreConhecimento $arvoreConhecimento)
    {
        $rules = [
            'assunto' => 'required|min:3|max:255',
            'user_id' => 'exists:users,id',
            'grupo_id' => 'exists:grupos,id',
            'subgrupo_id' => 'exists:subgrupos,id',
            'descricao' => 'required|min:3',
        ];
        $feedback = [
            'required' => '* O campo :attribute é obrigatório.',
            'min' => '* O campo :attribute deve conter no mínimo :min caracteres.',
            'max' => '* O campo :attribute deve conter no máximo :max caracteres.',
            'grupo_id.exists' => '* Selecione um Grupo.',
            'subgrupo_id.exists' => '* Selecione um Subgrupo.',
        ];

        $request->validate($rules, $feedback);

        $arvore = $request->all();
        $arvore['descricao'] = $request->descricao;

        $dom = new \DOMDocument();
        $dom->loadHTML($arvore['descricao'], 9);

        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {

            //Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {

                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time() . $key . ".png";
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }

        $descricao = $dom->saveHTML();



        if ($request->image) {
            $arvore['image'] = $request->image->store('arvore_conhecimento');

        }
        ;

        $arvoreConhecimento->update($arvore);


        return redirect()->route('arvore_conhecimento.index')->with('sucesso', 'Conhecimento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArvoreConhecimento $arvoreConhecimento)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($arvoreConhecimento->descricao, 9);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {

            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $arvoreConhecimento->delete();

        return redirect()->route('arvore_conhecimento.index')->with('sucesso', 'Conhecimento deletado com sucesso.');
    }
}
