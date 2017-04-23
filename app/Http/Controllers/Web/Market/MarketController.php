<?php

namespace App\Http\Controllers\Web\Market;

use App\Models\ServiceType;
use App\Models\Appointment;
use App\Models\Product;
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
        $id = $request->id;
        $model = new ServiceType();
        $data = $model->lists($type=['type'=>1]); // 服务类型
        if($id)
            $product = Product::find($id);
        else
            $product = null;

        return view('web.market.marketing-order')->with([
            'data' => $data,
            'product' => $product
        ]);
    }

    /**
     * 存储营销服务预约
     * @author      lxhui<772932587@qq.com>
     * @param  StoreAppointmentRequest  $request
     * @return Response
     */
    public function store(Request  $request){
        $req = new StoreAppointment();
        if(!$req->authorize())
            return response()->json(['code'=>200, 'status' => 0,'message' => '请先登录!' ]);

        $data =$request->all();
        $validator = \Validator::make($data, $req->rules(),$req->messages());
        if ($validator->fails()) {
            $validator_error_first = $validator->errors()->first();
            return response()->json(['code'=>200, 'status' => 0,'message' => $validator_error_first ]);
        }
        $data['user_id'] = \Auth::id();
        try {
            if(Appointment::create($data))
                return response()->json(['code'=>200, 'status' => 1,'message' => '预约成功!' ]);
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => '预约失败!' ]);
        } catch (\Exception $e) {
            return response()->json(['code'=>200, 'status' => 0,'message' => '服务器异常!' ]);
        }

    }

}
