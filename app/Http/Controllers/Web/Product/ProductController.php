<?php

namespace App\Http\Controllers\Web\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Product;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        return view('web.product.index')->with([
            'result' => json_encode('test')
        ]);
    }

    /**
     * 活动宣传
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function detail($id)
    {
        Product::find($id)->increment('view_counts');
        $data =  Product::find($id);

        return view('web.product.detail')->with(['data'=>$data]);
    }


}
