<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{protected $fillable = [ 'name','input_type_id', 'description','order'];
    public function create()
	{
		return view('properties/create');
	}
}
