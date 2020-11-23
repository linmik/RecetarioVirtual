<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


use App\Models\Seguidor;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function Seguidores()
    {
        //return $this->hasMany(Seguidor::class); //personas que me siguen
        return $this->belongsToMany(User::class,'seguidores','user_id','seguidor_id');

    }

    public function Seguidos()
    {
        //return $this->hasMany(Seguidor::class,'seguidor_id'); //personas que sigo
        return $this->belongsToMany(User::class,'seguidores','seguidor_id','user_id');
    }

    public function Recetas()
    {
        return $this->hasMany(Receta::class);
    }

    public function recetas_likes(){
        return $this->belongsToMany(Receta::class,'likes');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
