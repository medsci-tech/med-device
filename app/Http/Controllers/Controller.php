<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\ServiceType;
use App\Models\Department;
use App\Models\Hospital;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 服务类型
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getServices()
    {
        return ServiceType::select('id as service_type_id','name')->get();
    }
    /**
     * 服务类型
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getDeparts()
    {
        return Department::select('id as depart_id','name')->get();
    }

    /**
     * 获取医院
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    protected  function getHospitals(array $data=[])
    {
        if(!isset($data['province']) || !isset($data['city']))
            return response()->json(['code'=>200, 'status' =>0,'message' => '省市不能为空' ]);
        $province = $data['province'];
        $city = $data['city'];
        $country =  isset($data['area']) ? $data['area']: '';
        $find   = '省';
        $pos = strpos($province, $find);
        if ($pos !== false)
            $province =str_replace($find,"",$province);

        $find   = '市';
        $pos = strpos($city, $find);
        if ($pos !== false)
            $city =str_replace($find,"",$city);

        $name = isset($data['hospital']) ? $data['hospital']:'';
        $where = [];
        if($province){
            $where['province'] = $province;
            if($city)
                $where['city'] = $city;
            if($name)
                $list = Hospital::limit(20)->select(['id','province','city','country as area','hospital'])->where('province','like', "%".$province."%")->where('city','like', "%".$city."%")->where('hospital', 'like', '%' . $name . '%')->get();
            else
                $list = Hospital::limit(20)->select(['id','province','city','country as area','hospital'])->where('province','like', "%".$province."%")->where('city','like', "%".$city."%")->get();
        }
        else
            $list = null;

        return response()->json(['code'=>200, 'status' => 1,'message' => '医院列表','data'=>$list ]);

    }
}
