<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'user_id',
		'title',
		'slug',
		'image',
		'content',
		'premium'
	];

	/**
	 * relation post user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function author(){
    	return $this->belongsTo('App\User', 'user_id');
	}

	/**
	 * excerpt post content
	 *
	 * @return string
	 */
	public function getExcerpt(){
    	return str_limit($this->content, 40);
	}
}

