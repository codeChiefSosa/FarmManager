<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                'name' => 'required',
                'spiece' => 'required',
                'points' => ''
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

        dd($animal);
        //return redirect('/user/' . $user->id);
    }
}
