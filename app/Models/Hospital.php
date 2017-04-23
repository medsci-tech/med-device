<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @mixin \Eloquent
 */
class Hospital extends Model
{
    protected $hidden = ['created_at','updated_at','deleted_at','hospital_level','country_id','city_id','city_id','province_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province',
        'city',
        'area',
        'hospital'
    ];
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}