<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	const ROLES = [
		0 => ['Producer', 'Produces films'],
		1 => ['Cameraman', 'Shoots movies with a camera'],
		2 => ['Soundman', 'Records audio'],
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'description',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		//
	];

	/*
     * Relation definition.
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }

	public $timestamps = false;
}
