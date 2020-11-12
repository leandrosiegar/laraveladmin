<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\SocialProfile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function adminlte_image() {
        $socialProfile = $this->socialProfiles()->first();

        if ($socialProfile) {
            return $socialProfile->social_avatar;
        }
        else { // que retorne cualquier img aleatoria
            return "https://picsum.photos/300/300";
        }
    }

    // relación uno a muchos
    public function socialProfiles() { // es profiles pq un user puede tener varios (facebook, google, twitter, etc)
        return $this->hasMany(SocialProfile::class);
    }
}
