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
            'result' => json_encode('test')
        ]);
    }

    public function agentSign(Request $request)
    {
        return view('web.agent.agent-sign')->with([
            'result' => json_encode('test')
        ]);
    }



}
