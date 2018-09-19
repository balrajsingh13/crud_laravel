<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //  public function setCreatedAtAttribute($value)
    // {
    // // to Disable created_at
    // }
    //  public function setUpdatedAtAttribute($value)
    // {
    // // to Disable updated_at
    // }

    public $timestamps = false;

    protected $fillable = [
        'emp_ID',
        'emp_name', 
        'emp_contact',
        'city',
        'dept_ID',
        'desig_ID',
        'eORa',
        'updateDate',
        'password'
    ];

}
