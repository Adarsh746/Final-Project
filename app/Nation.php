<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
	protected $primaryKey = 'nation_id';
    public function state()
    {

        return $this->hasMany('App\State');
    }
}
