<?php

namespace App\Http\Controllers\Web\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Cooperation;
use App\Models\Collection;
use App\Http\Requests\Interfaces\CheckCollection;
use App\Http\Requests\StoreCooperation;
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
        try {
            $data = Product::find($id);
            if($data)
                Product::find($id)->increment('view_counts');
            $data_similar = Product::orderBy('id')->offset(0)->where(['is_hot'=>1])->limit(8)->get();
        }
        catch (\Exception $e) {
            abort(404);
        }

        return view('web.product.detail')->with(['data' => $data,'data_similar' => $data_similar]);
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

    /**
     * 合作意向
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function join(Request $request)
    {
        $req = new StoreCooperation();
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
            if(Cooperation::create($data))
                return response()->json(['code'=>200, 'status' => 1,'message' => '提交成功!' ]);
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => '提交失败!' ]);
        } catch (\Exception $e) {
            return response()->json(['code'=>200, 'status' => 0,'message' => '服务器异常!' ]);
        }

    }


}
