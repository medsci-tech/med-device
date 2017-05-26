<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductBanner
 * @package App\Models
 * @mixin \Eloquent
 */
class ProductTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}