<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSpecification
 * @package App\Models
 * @mixin \Eloquent
 */
class OrderService extends Model
{
    protected $hidden = ['updated_at','created_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_type_id',
        'user_id'
    ];
    public function serviceTypes()
    {
        return $this->belongsToMany(\App\Models\ServiceType::class,'order_services', 'id','service_type_id');
    }


}