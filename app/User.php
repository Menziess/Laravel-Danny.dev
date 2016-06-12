<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'email',
        'password',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    /*
     * User roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /*
     * User resources.
     */
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function profilePicture()
    {
        return $this->hasMany(Resource::class)
            ->where('name', 'profile')
            ->orderBy('id', 'desc')
            ->first();
    }

    /*
     * Get full user name.
     */
    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /*
     * Make slug to access user profile.
     */
    public function makeSlug() {
        $slug = strtolower($this->first_name . '-' . $this->last_name);
        $ext = null;
        while (self::where('slug', $slug . $ext)->exists()) {
            if (!$ext) {
                $ext = '.' . rand(1, 999);
            }
        }
        $this->slug = $slug . $ext;
        $this->save();
    }
}
