<?php

namespace App;

use Image;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
	use SoftDeletes;

	const TYPES = [
		0 => 'image',
		1 => 'video',
		2 => 'audio',
	];

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'resources';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'url',
		'type',
		'mime',
		'extension',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		//
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

	# Define relation
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Create new image from file.
	 *
	 * @param  File    $file
	 * @param  integer $width
	 * @param  integer $height
	 * @return string  $filepath
	 */
	public function uploadImageFile($file, $width = 256, $height = 256, $name = null)
	{
		$image = Image::make($file)->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

		$this->name = $name;
		$this->url = self::generateName();
		$this->type = self::TYPES[0];
		$this->mime = $file->getClientMimeType();
		$this->extension = '.' . $file->getClientOriginalExtension();
		return self::storeImage($image);
	}

	/**
	 * Create new image from path.
	 *
	 * @param  string  $path
	 * @param  integer $width
	 * @param  integer $height
	 * @return string  $filepath
	 */
	public function uploadImagePath($path, $width = 256, $height = 256, $name = null)
	{
		$image = Image::make($path)->resize($width, $height);

		$this->name = $name;
		$this->url = self::generateName();
		$this->type = self::TYPES[0];
		$this->mime = $image->mime();
		$this->extension = pathinfo($path, PATHINFO_EXTENSION)
			?: $this->getExtension($this->mime);
		return self::storeImage($image);
	}

	/**
	 * Store image in storage.
	 *
	 * @param  Image 	$image
	 * @return string 	$filepath
	 */
	private function storeImage($image)
	{
		$filepath = 'public/images/' . $this->url . $this->extension;
		$image->interlace();
		$image->save(storage_path('app/' . $filepath));

		return $filepath;
	}

	/**
	 * Remove from storage.
	 *
	 * @param  string $file name + extension
	 * @return void
	 */
	public function removeFromStorage()
	{
		$filepath = 'public/images/' . $this->url . $this->extension;
		Storage::delete($filepath);
		$this->delete();
	}

	/**
	 * Generate a new name, that can be used as file/resource name.
	 *
	 * @return string
	 */
	public static function generateName()
	{
		return md5(uniqid(rand(), true));
	}

	/**
	 * Use mime type to get a guessed extension.
	 *
	 * @param  string $mime_type
	 * @return string $extension
	 */
	private static function getExtension ($mime_type) {
		$extensions = [
			'image/jpeg' => '.jpeg',
			"image/png" => '.png',
			"image/gif" => '.gif',
			'text/xml' => '.xml',
			"image/x-ms-bmp" => '.bmp',
		];
		return $extensions[$mime_type];
	}
}
