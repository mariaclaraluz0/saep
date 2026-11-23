<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Tutor;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function listar()
    {
        $pets = Pet::with('tutor')->get();

        return view('pets.listar', compact('pets'));
    }

    public function create()
    {
        $tutores = Tutor::all();

        return view('pets.create', compact('tutores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required|exists:tutores,id',
            'nome' => 'required|string|max:100',
            'especie' => 'nullable|string|max:50',
            'raca' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:50',
        ]);

        Pet::create([
            'tutor_id' => $request->tutor_id,
            'nome' => $request->nome,
            'especie' => $request->especie,
            'raca' => $request->raca,
            'email' => $request->email,
            'endereco' => $request->endereco,
        ]);

        return redirect()->back()->with('success', 'Pet cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);

        $tutores = Tutor::all();

        return view('pets.edit', compact('pet', 'tutores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tutor_id' => 'required|exists:tutores,id',
            'nome' => 'required|string|max:100',
            'especie' => 'nullable|string|max:50',
            'raca' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:50',
        ]);

        $pet = Pet::findOrFail($id);

        $pet->update([
            'tutor_id' => $request->tutor_id,
            'nome' => $request->nome,
            'especie' => $request->especie,
            'raca' => $request->raca,
            'email' => $request->email,
            'endereco' => $request->endereco,
        ]);

        return redirect()->back()->with('success', 'Pet atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Pet::destroy($id);

        return redirect()->back()->with('success', 'Pet deletado com sucesso!');
    }
}
