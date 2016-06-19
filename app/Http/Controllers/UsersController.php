<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Resource;
use App\Http\Requests;

class UsersController extends Controller
{
	/**
	 * Get user portfolio.
	 *
	 * @return View
	 */
	public function portfolio($slug)
	{
		$user = User::where('slug', $slug)->firstOrFail();
		$videos = $user->videos()->take(6)->get();

		return view('pages.portfolio', compact('user', 'videos'));
	}

	/**
	 * Get own user portfolio.
	 *
	 * @return Redirect
	 */
	public function getIndex($id = null)
	{
		$slug = Auth::user()->slug;

		return redirect($slug);
	}

	/**
	 * Post a new profile picture.
	 *
	 * @return Redirect
	 */
	public function postPicture(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'id'    => 'required|exists:users',
			'file'  => 'required|mimes:jpeg,jpg,png,gif|max:4000',
		]);

		$user = Auth::user();

		if ($validator->fails()) {
			return redirect($user->slug . '#pictureModal')->withErrors($validator);
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

		return redirect($user->slug)->with('pictureUploaded', 'Picture uploaded');;
	}

	public function postAbout(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'id'    => 'required|exists:users',
			'about' => 'required|string',
		]);

		$user = Auth::user();

		if ($validator->fails()) {
			return redirect($user->slug . '#aboutModal')->withErrors($validator);
		}
		if (!$user->id == $request->id) {
			abort(403);
		}

		$user->about = $request->about;
		$user->save();

		return redirect($user->slug . '#about')->with('aboutUpdated', 'About updated');;
	}

	/**
	 * Post a new video.
	 *
	 * @return Redirect
	 */
	public function postVideo(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'id'    => 'required|exists:users',
			'url'   => 'required|integer',
		]);

		$user = Auth::user();

		if ($validator->fails()) {
			return redirect($user->slug . '#videoModal')->withErrors($validator);
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

		return redirect($user->slug . '#portfolio')->with('videoAdded', 'Video added');;
	}

	/**
	 * Remove video by id.
	 *
	 * @return Redirect
	 */
	public function deleteVideo($id, Request $request)
	{
		$video = Resource::findOrFail($id)->delete();

		return redirect(\URL::previous() . '#portfolio')->with('videoDeleted', 'Video deleted');
	}
}
