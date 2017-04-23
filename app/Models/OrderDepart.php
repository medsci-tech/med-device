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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'depart_id',
        'user_id'
    ];

    public function depart()
    {
        return $this->belongsTo(Department::class, 'depart_id');
    }

}