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

        'facebook',
        'google',
        'twitter',
        'linkedin',
        'website',

        'street',
        'number',
        'zipcode',
        'city',
        'country',
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
    public function resources($type = null)
    {
        return $this->hasMany(Resource::class)
            ->where('type', $type);
    }

    /*
     * User videos.
     */
    public function videos()
    {
        return $this->hasMany(Resource::class)
            ->where('type', 'video');
    }

    /*
     * User profile picture.
     */
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    /*
     * Get full user name.
     */
    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /*
     * Get profile picture.
     */
    public function getPicture()
    {
        $image = $this->resource ? 'storage/images/' . $this->resource->url . $this->resource->extension : null;
        return $image;
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
