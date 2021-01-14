<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Animal;

class AnimalsController extends Controller
{
    public function create()
    {
        return view('animals/create');
    }
    public function store()
    {
        $data = request()->validate(
            [
                'name' => ['required', 'max:30'],
                'spiece' => ['required', 'in:Cow,Chicken,Horse'],
                'points' => ['between:0,20', 'numeric', 'nullable']
            ]
        );
        $user = auth()->user();

        $animal = Animal::create(
            [
                'user_id' => $user->id,
                'name' => $data['name'],
                'points' => $data['points'],
                'spiece' => $data['spiece']
            ]
        );

        return redirect('/user/' . $user->id);
    }

    public function edit(Animal $animal)
    {
        $this->authorize('update', $animal);
        return view('animals.edit', compact('animal'));
    }

    public function destroy(Animal $animal)
    {
        Animal::destroy($animal->id);
        return redirect('/user/' . $animal->user_id . '/animals');
    }
    public function update(Animal $animal)
    {
        $data = request()->validate([
            'name' => ['required', 'max:30'],
            'points' => ''
        ]);
        $animal->update($data);
        return redirect('/user/' . $animal->user_id . '/animals');
    }
}
