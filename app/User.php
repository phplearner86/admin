<?php

namespace App;

use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'verified', 'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

     public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {

        // Single Role
        if (is_string($role)) 
        {
            return $this->roles->contains('name', $role);
        }

        //Collection of roles
        return !! $role->intersect($this->roles)->count();
    }

    public function owns($article)
    {
        return $this->id == $article->user_id;
    }

    public function getJoinedAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function verifyAccount()
    {
        $this->email_token = null;
        $this->verified = true;

        $this->save();
    }

    public function assignRole($role)
    {
        $this->roles()->sync($role);
    }
}
