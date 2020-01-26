<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    public function Gallery()
	{
		return $this->hasMany('App\Gallery');
    }
}
