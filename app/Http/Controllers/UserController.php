<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::all();
        return view('app.user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'firstName' => ['required', 'min:3', 'max:15'],
            'lastName' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ];

        $feedback = [
            'firstName.required' => '* O campo nome é obrigatório.',
            'firstName.min' => '* O campo nome deve ter no mínimo :min caracteres.',
            'firstName.max' => '* O campo nome deve ter no máximo :max caracteres.',
            'lastName.required' => '* O campo sobrenome é obrigatório.',
            'lastName.min' => '* O campo sobrenome deve ter no mínimo :min caracteres.',
            'lastName.max' => '* O campo sobrenome deve ter no máximo :max caracteres.',
            'password.required' => '* O campo senha é obrigatório.',
            'password.min' => '* O campo senha deve ter no mínimo :min caracteres.',
            'confirmed' => '* Senhas não conferem.',
            'email' => '* O campo email não segue o padrão exemplo@email.com ou exemplo@email.com.br',
            'email.unique' => '* Email já cadastrado para outro usuário.'
        ];


        $request->validate($rules, $feedback);
        $data = $request->all();

        User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('user.index')->with('sucesso', 'Usuário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('app.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);


        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ];

        $feedback = [
            'password.required' => '* O campo senha é obrigatório.',
            'password.min' => '* O campo senha deve ter no mínimo :min caracteres.',
            'confirmed' => '* Senhas não conferem.',
            'email.required' => '* O campo e-mail é obrigatório.',
            'email' => '* O campo email não segue o padrão exemplo@email.com ou exemplo@email.com.br',
            'email.unique' => '* Email já cadastrado para outro usuário.'
        ];

        $request->validate($rules, $feedback);

        $user->email = $request->get('email');
        $user['password'] = Hash::make($request->get('password'));


        $user->update();

        return redirect()->route('user.index')->with('sucesso', 'Usuário atualizado com sucesso.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
