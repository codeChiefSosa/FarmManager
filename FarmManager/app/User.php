<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function getAnimalCount(string $spiece)
    {
        $foo = DB::table('animals')
            ->where('user_id', $this->id)
            ->where('spiece', $spiece)
            ->get();

        return $foo->count();
    }
    public static function addInitializeAnimals(User $user)
    {
        for ($i = 0; $i < 20; $i++) {
            Animal::create(
                [
                    'user_id' => $user->id,
                    'name' => 'FooCow',
                    'spiece' => 'Cow'
                ]
            );
            Animal::create(
                [
                    'user_id' => $user->id,
                    'name' => 'FooChicken',
                    'spiece' => 'Chicken'
                ]
            );
            Animal::create(
                [
                    'user_id' => $user->id,
                    'name' => 'FooHorse',
                    'spiece' => 'Horse'
                ]
            );
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            User::addInitializeAnimals($user);
        });
    }
}
