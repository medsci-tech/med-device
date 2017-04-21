<?php

namespace App\Http\Controllers\Web\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Collection;
use App\Http\Requests\Interfaces\CheckCollection;
class ProductController extends Controller
{

    use CheckCollection;
    public function index(Request $request)
    {
        return view('web.product.index')->with([
            'result' => json_encode('test')
        ]);
    }

    /**
     * 产品宣传
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function detail($id)
    {
        Product::find($id)->increment('view_counts');
        $data = Product::find($id);

        return view('web.product.detail')->with(['data' => $data]);
    }

    /**
     * 产品收藏
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function collect(Request $request)
    {
        try {
            $res =$this->checkCollection($request->all());
            if($res['status']==1)
                return ['code'=>200, 'status' => 1,'message' => '操作成功!' ];
            else
                return ['code'=>200, 'status' => 0,'message' =>$res['message'] ];
        }
        catch (\Exception $e) {
            return ['code' => 200, 'status' => 0, 'message' => $e->getMessage()];
        }
    }


}
