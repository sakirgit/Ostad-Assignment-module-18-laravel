<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

	use SoftDeletes;
	
   // use HasFactory;
	protected $fillable = ['title', 'content'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public static function countPostsByCategory($categoryId)
	{
		return self::where('category_id', $categoryId)->count();
	}

	public static function getSoftDeletedPosts()
	{
		 return self::onlyTrashed()->get();
	}

	public function posts()
	{
		 return $this->hasMany(Post::class);
	}

	public function latestPost()
	{
		 return $this->hasOne(Post::class)->latestOfMany();
	}
	
}
