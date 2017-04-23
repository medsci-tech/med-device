<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BeanLog
 * @package App\Models
 * @mixin \Eloquent
 */
class ServiceType extends Model
{
    protected $hidden = ['created_at','updated_at','deleted_at','type'];
    /**
     * @param $price
     * @return $this
     */
    public  function lists($type=[])
    {
        $where = $type ? ['type'=>$type] : [];
        return $this::where($where)->get();
    }


}