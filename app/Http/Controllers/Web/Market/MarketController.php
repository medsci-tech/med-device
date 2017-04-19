<?php

namespace App\Http\Controllers\Web\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class MarketController extends Controller
{


    public function index(Request $request)
    {
        return view('web.market.index')->with([
            'result' => json_encode('test')
        ]);
    }

    public function marketingOrder(Request $request)
    {
        return view('web.market.marketing-order')->with([
            'result' => json_encode('test')
        ]);
    }


}
