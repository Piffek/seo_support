<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	protected $fillable = [
			'title', 'body','slug',
	];
	
	
	public function tags()
	{
		return $this->belongsToMany('App\Tags');
	}
}
