<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	/*
	 * Show landing page.
	 */
	public function getIndex()
	{
		if (Auth::guest()) {
			$links = [
				['Login', '/login'],
				['Register', '/Register'],
			];
		}
		return view('welcome', compact('links'));
	}
}
