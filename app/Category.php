<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    Protected $fillable=[
        'user_id',
        'category_name'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
