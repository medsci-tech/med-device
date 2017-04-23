<?php

namespace App\Http\Controllers\Web\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
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
        if ($request->isMethod('post')) {

            $data = $request->all();
            $result =$this->checkAgent($request->all());
            if(\Auth::user()->agent)
                return response()->json(['code' => 200, 'status' => 0, 'message' => '您已经预约过了!']);

            $data['user_id'] = \Auth::id();
            try {
                if($result['status'] ==1)
                {

                   // $user = User::firstOrCreate(['name' => 'John']);如果不存在只能插入name字段

                    $user = \Auth::user();
                    $user->is_agent =1; // 标记已登记
                   // $user->save();
                    return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
                }
                else
                    return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);

                return response()->json(['code' => 200, 'status' => 1, 'message' => 'oh!']);
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
