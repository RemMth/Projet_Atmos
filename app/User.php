<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable {
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

    public function isAdmin($id){
        $user = User::find($id);

        if($user['administrateur'] == 1){
            return true;
        }else{
            return false;
        }
    }

    function seenSaison($idSerie, $num){
        $ids = Serie::find($idSerie)->episodes()->where('saison', $num)->pluck('id')->toArray();
        foreach ($ids as $id)
            if($this->seen->contains($id) == false)
                return false;

        return true;
    }

    function seenSerie($idSerie){
        $ids = Serie::find($idSerie)->episodes()->pluck('id')->toArray();
        foreach ($ids as $id)
            if($this->seen->contains($id) == false)
                return false;

        return true;
    }

    function getName(){
        return Auth::user()->name;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function seen() {
        return $this->belongsToMany("App\Episode", 'seen');
    }
}
