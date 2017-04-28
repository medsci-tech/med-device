<?php

namespace App\Http\Controllers\Web\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Models\OrderDepart;
use App\Models\OrderService;
use App\Models\OrderHospital;
use App\Models\Hospital;
use App\Http\Requests\Interfaces\CheckAgent;
class AgentController extends Controller
{
    use CheckAgent;
    public function index(Request $request)
    {
        return view('web.agent.index')->with([
            'result' => json_encode(null)
        ]);
    }

    /**
     * 经纪人登记
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function agentSign(Request $request)
    {
        if (!\Auth::check())
            return redirect('/login');

        if ($request->isMethod('post')) {
            $data = $request->all();
            $result =$this->checkAgent($data);
            if (\Auth::check())
            {
                if(\Auth::user()->is_agent)
                    return response()->json(['code' => 200, 'status' => 0, 'message' => '您已经登记过了!']);
            }
            $data['user_id'] = \Auth::id();
            try {
                if($result['status'] ==1)
                {
                    /* 登记科室 */
                    $depart_ids_arr = json_decode($request->depart_ids,true);
                    if(is_array($depart_ids_arr))
                    {
                        foreach($depart_ids_arr as $val)
                            OrderDepart::firstOrCreate(['depart_id' => $val['depart_id'],'user_id'=>\Auth::id()]);
                    }
                    /* 登记服务 */
                    $service_type_ids_arr = json_decode($request->service_type_ids,true);
                    if(is_array($service_type_ids_arr))
                    {
                        foreach($service_type_ids_arr as $val)
                            OrderService::firstOrCreate(['service_type_id' => $val['service_type_id'],'user_id'=>\Auth::id()]);
                    }
                    /* 登记医院 */
                    $hospitals_arr = json_decode($request->hospitals,true);
                    if(is_array($hospitals_arr))
                    {
                        foreach($hospitals_arr as $val)
                        {
                            $model = Hospital::firstOrCreate(['province'=>$val['province'],'city'=>$val['city'],'hospital'=>$val['hospital']]);
                            $hospital_id = $model->id;
                            OrderHospital::firstOrCreate(['hospital_id' => $hospital_id,'user_id'=>\Auth::id()]);
                        }
                    }
                    $updata = [
                        'is_agent' => 1,
                        'real_name'=>$request->real_name,
                        'sex'=>$request->sex,
                        'email'=>$request->email,
                        'province'=>$request->province,
                        'city'=>$request->city,
                        'area'=>$request->area,
                    ];
                    User::where('id', \Auth::id())->update($updata);
                    return response()->json(['code'=>200, 'status' => 1,'message' => '登记成功' ]);
                }
                else
                    return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);

            } catch (\Exception $e) {
                return response()->json(['code' => 200, 'status' => 0, 'message' => '服务器异常!']);
            }
        }
//        $model = new ServiceType();
//        $s_data = $model->lists(); // 服务类型
//        $d_data = Department::all();

        return view('web.agent.agent-sign')->with([
           // 's_data' => $s_data,
           // 'd_data' => $d_data,
        ]);

    }



}
