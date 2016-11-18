<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable=[
    	'user_id',
    	'category_id',
    	'path',
    	'file',
    ];
}
