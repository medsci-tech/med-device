<?php

namespace App\Http\Controllers\Web\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AgentController extends Controller
{
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
//        $model = new ServiceType();
//        $s_data = $model->lists(); // 服务类型
//        $d_data = Department::all();

        return view('web.agent.agent-sign')->with([
           // 's_data' => $s_data,
           // 'd_data' => $d_data,
        ]);

    }



}
