<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @package App\Models
 * @mixin \Eloquent
 */
class Department extends Model
{

    protected $hidden = ['created_at','updated_at','deleted_at'];

}