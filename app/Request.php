<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['blood_group_id', 'quantity'];

    public function user(){

    	return $this->belongsTo('App\User');

    }
}
