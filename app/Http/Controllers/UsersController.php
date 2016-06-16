<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Resource;
use App\Http\Requests;

class UsersController extends Controller
{
	/*
	 * Get user portfolio.
	 */
    public function portfolio($slug)
    {
    	$user = User::where('slug', $slug)->firstOrFail();
        $videos = $user->videos()->take(6)->get();
    	return view('pages.portfolio', compact('user', 'videos'));
    }

    /*
     * Get own user portfolio.
     */
    public function getIndex($id = null)
    {
    	$slug = Auth::user()->slug;
    	return redirect($slug);
    }

    /*
     * Post a new profile picture.
     */
    public function postPicture(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'    => 'required|exists:users',
            'file'  => 'mimes:jpeg,jpg,png,gif|max:4000',
        ]);

        $user = Auth::user();

        if ($validator->fails()) {
            redirect($user->slug)->withErrors($validator);
        }
        if (!$user->id == $request->id) {
            abort(403);
        }

        $resource = new Resource;
        $filepath = $resource->uploadImageFile($request->file('file'));

        # Persist if uploaded succesfully
        if (\Storage::exists($filepath)) {
            if ($user->resource) {
                $user->resource->removeFromStorage();
            }
            $resource->user()->associate($user)->save();
            $user->resource()->associate($resource)->save();
        }

        return redirect($user->slug)->with('message', 'Updated profile picture');
    }

    /*
     * Post a new profile picture.
     */
    public function postVideo(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'    => 'required|exists:users',
            'url'   => 'int',
        ]);

        $user = Auth::user();

        if ($validator->fails()) {
            redirect($user->slug)->withErrors($validator);
        }
        if (!$user->id == $request->id) {
            abort(403);
        }

        # Persist if uploaded succesfully
        $user->resources()->save(Resource::create([
            'type'          => 'video',
            'url'           => $request->url,
            'name'          => $request->name,
            'description'   => $request->description,
        ]));

        return redirect($user->slug)->with('message', 'Added video');
    }
}
