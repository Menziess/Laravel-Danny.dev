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
	public function getIndex(Request $request)
	{
		if (Auth::guest()) {
			$links = [
				['Login', '/login'],
				['Register', '/register'],
			];
		}
		if ($request->search) {
			$videos = \App\Resource::search($request->search)->whereType('video')->take(20)->get();
			$users 	= \App\User::search($request->search)->take(20)->get();
			return view('results', compact('links', 'videos', 'users'));
		}
		$background	= \App\Resource::whereType('video')->orderByRaw('RAND()')->first();
		return view('welcome', compact('links', 'background'));
	}
}
