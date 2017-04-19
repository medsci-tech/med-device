<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BeanLog
 * @package App\Models
 * @mixin \Eloquent
 */
class Appointment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'type_id',
        'province',
        'city',
        'area',
        'departments',
        'hospital_name',
        'contact_name',
        'contact_phone',
        'comment',
    ];

}