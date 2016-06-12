<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Http\Requests;

class UsersController extends Controller
{
	/*
	 * Get user portfolio.
	 */
    public function portfolio($slug)
    {
    	$user = User::where('slug', $slug)->firstOrFail();
    	return view('pages.portfolio', compact('user'));
    }

    /*
     * Get own user portfolio.
     */
    public function getIndex()
    {
    	$slug = Auth::user()->slug;
    	return redirect($slug);
    }
}
