<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSpecification
 * @package App\Models
 * @mixin \Eloquent
 */
class OrderHospital extends Model
{
    protected $hidden = ['updated_at','created_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospital_id',
        'user_id'
    ];

    public function hospital()
    {
        return $this->belongsTo(\App\Models\Hospital::class, 'hospital_id');
    }
    public function hospitals()
    {
        return $this->belongsToMany(\App\Models\Hospital::class,'order_hospitals', 'id','hospital_id');
    }

}