<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $primaryKey = 'state_id';
    public function nation()
    {
        return $this->belongsTo('App\Nation');
    }
    public function district()
    {
        return $this->hasMany('App\District');
    }
}
