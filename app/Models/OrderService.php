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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'user_id'
    ];


}