<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Franchise_group extends Authenticatable
{
    use Notifiable;
    protected $primaryKey ='franchises_group_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchises_group_id','franchises_group_name','post_office_id'
    ];

   
}

