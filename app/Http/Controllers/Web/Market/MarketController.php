<?php

namespace App\Http\Controllers\Web\Market;

use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StoreAppointment;
class MarketController extends Controller
{
    public function index(Request $request)
    {
        return view('web.market.index')->with([
            'result' => json_encode('test')
        ]);
    }

    /**
     * 营销服务预约
     * @author      lxhui<772932587@qq.com>
     * $login_sign 登录标识
     * @since 1.0
     * @return array
     */
    public function marketingOrder(Request $request)
    {
        $model = new ServiceType();
        $data = $model->lists($type=['type'=>1]); // 服务类型

        return view('web.market.marketing-order')->with([
            'data' => $data
        ]);
    }

    /**
     * 存储营销服务预约
     * @author      lxhui<772932587@qq.com>
     * @param  StoreAppointmentRequest  $request
     * @return Response
     */
    public function store(StoreAppointment $request){



    }


}
