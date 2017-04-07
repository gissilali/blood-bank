<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = ['name', 'blood_group_id', 'email', 'weight', 'age'];

    public function bloodGroup(){

    	return $this->belongsTo('App\BloodGroup');
    	
    }
}
