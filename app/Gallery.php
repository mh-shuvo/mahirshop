<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function categoryGallery()
    {
        return $this->belongsTo('App\CategoryGallery','gal_cat_id');
    }
}
