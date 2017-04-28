<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSpecification
 * @package App\Models
 * @mixin \Eloquent
 */
class OrderDepart extends Model
{
    protected $hidden = ['updated_at','created_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'depart_id',
        'user_id'
    ];


    public function departs()
    {
        return $this->belongsToMany(\App\Models\Department::class, 'order_departs','depart_id', 'id');

    }


}