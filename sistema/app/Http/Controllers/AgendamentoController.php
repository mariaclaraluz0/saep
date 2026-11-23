<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Pet;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function listar()
    {
        $agendamentos = Agendamento::with('pet')
            ->orderBy('data')
            ->orderBy('hora')
            ->get();

        return view('agendamento.listar', compact('agendamentos'));
    }

    public function create()
    {
        $pets = Pet::all();

        return view('agendamento.create', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'data' => 'required|date',
            'hora' => 'required',
            'motivo' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        Agendamento::create([
            'pet_id' => $request->pet_id,
            'data' => $request->data,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Agendamento cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $pets = Pet::all();

        return view('agendamento.edit', compact('agendamento', 'pets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'data' => 'required|date',
            'hora' => 'required',
            'motivo' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        $agendamento = Agendamento::findOrFail($id);

        $agendamento->update([
            'pet_id' => $request->pet_id,
            'data' => $request->data,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Agendamento::destroy($id);

        return redirect()->back()->with('success', 'Agendamento deletado com sucesso!');
    }
}
