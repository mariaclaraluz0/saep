<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function listar(Request $request)
    {
        $query = Tutor::query();

        if ($request->filled('nome')) {
            $query->where(
                'nome',
                'like',
                '%' . $request->nome . '%'
            );
        }

        $tutores = $query->get();

        return view('tutores.listar', compact('tutores'));
    }

    public function create()
    {
        return view('tutores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string',
            'telefone' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:50',
        ]);

        Tutor::create([
            'nome' => $request->nome,
            'cpf_criptografado' => encrypt($request->cpf),
            'telefone' => $request->telefone,
            'email' => $request->email,
            'endereco' => $request->endereco,
        ]);

        return redirect()->back()->with('success', 'Tutor cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);

        return view('tutores.edit', compact('tutor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'nullable|string',
            'telefone' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:50',
        ]);

        $tutor = Tutor::findOrFail($id);

        $dados = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'endereco' => $request->endereco,
        ];

        if ($request->filled('cpf')) {
            $dados['cpf_criptografado'] = encrypt($request->cpf);
        }

        $tutor->update($dados);

        return redirect()->back()->with('success', 'Tutor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Tutor::destroy($id);

        return redirect()->back()->with('success', 'Tutor deletado com sucesso!');
    }
}
