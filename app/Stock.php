<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = ['donated', 'dispatched', 'blood_group_id'];

    public function bloodGroups(){

		return $this->hasMany('App\BloodGroup');   	

    }
}
