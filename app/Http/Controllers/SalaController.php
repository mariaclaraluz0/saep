<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Empresa;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function listar()
    {
        $salas = Sala::all();

        return view('salas.listar', compact('salas'));
    }

    public function create()
    {
        $salas = Sala::all();

        return view('salas.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        Sala::create([
            'n°_sala' => $request->n°_sala,
            'bloco' => $request->bloco,
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->back()->with('success','Cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $sala = Sala::findOrFail($id);

        $sala = Sala::all();

        return view('salas.edit', compact('sala', 'empresas'));
    }

    public function update(Request $request, $id)
    {
        $sala = Sala::findOrFail($id);

        $sala->update([
            'n°_sala' => $request->n°_sala,
            'bloco' => $request->bloco,
            'empresa_id' => $request->empresa_id,
        ]);

        return redirect()->back()->with('success','Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Veiculo::destroy($id);

        return redirect()->back()->with('success','Deletado com sucesso!');
    }
}