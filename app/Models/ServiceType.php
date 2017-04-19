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