<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Franchise extends Authenticatable
{
    use Notifiable;
    protected $primaryKey ='franchise_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'franchise_id','franchise_name','email','password','contact','contact1','DOB','blood_group','account_status','aproval_status','nation_id','state_id','district_id','post_office_id','image','aadhar_number','prem_address','curr_address','remember_token',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

