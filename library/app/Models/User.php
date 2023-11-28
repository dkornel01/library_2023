<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permission'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

<<<<<<< HEAD
    public function lending(){
        return $this->hasMany(Lending::class, 'user_id','id');
    }
    public function reservation(){
        return $this->hasMany(Reservation::class, 'user_id','id');
    }
=======
    public function lending()
        //kapcsolat, osztály, ott hogy hívják, itt hogy hívják
    {    return $this->hasMany(Lending::class, 'user_id', 'id'); }

    public function reservation()
        //kapcsolat, osztály, ott hogy hívják, itt hogy hívják
    {    return $this->hasMany(Reservation::class, 'user_id', 'id'); }
>>>>>>> 6a9165a445908138911896343ad9dee2860bf814
}
