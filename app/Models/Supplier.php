<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * @package App\Models
 * @mixin \Eloquent
 */
class Supplier extends Model
{
    protected $fillable = ['phone','supplier_name','supplier_desc','logo_image_url','type_id','openid','email','is_approved','fans'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Products', 'supplier_id');
    }
}