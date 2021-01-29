<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
use App\Animal;
use Illuminate\Support\Facades\Cache;



class UsersController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view(
            'users.index',
            [
                'user' => $user,
            ]
        );
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user);

        $data = request()->validate(
            [
                'name' => 'required',
                'description' => '',
                'image' => 'image'
            ]
        );

        if (array_key_exists('image', $data)) {
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $data = array_merge(
                $data,
                [
                    'image' => $imagePath
                ]
            );
        }
        $user->update($data);
        return redirect("/user/{$user->id}");
    }
    public function animals(User $user)
    {
        $currentPage = request()->get('page', 1);

        $animals = Cache::remember(
            'animals.collection' . $user->id . $currentPage,
            now()->addseconds(60),
            function () use ($user) {
                return Animal::whereIn('user_id', $user)->latest()->paginate(10);
            }
        );
        return view('users.animals', compact('user', 'animals'));
    }
    public function random()
    {
        $user = User::inRandomOrder()->first();
        return redirect("user/{$user->id}");
    }
}
