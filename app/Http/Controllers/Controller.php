<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\ServiceType;
use App\Models\Department;
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
}
