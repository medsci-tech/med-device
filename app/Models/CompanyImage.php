<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyImage
 * @package App\Models
 * @mixin \Eloquent
 */
class CompanyImage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'file_1',
        'file_2',
        'file_3',
        'file_4',
        'file_5',
        'file_6',
        'file_7',
        'file_8',
        'file_9',
        'file_10',
        'file_11',
    ];

    public function product()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

}