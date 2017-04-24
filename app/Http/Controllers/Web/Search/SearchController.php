<?php

namespace App\Http\Controllers\Web\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Keyword;
use App\Models\Product;
class SearchController extends Controller
{

    /**
     * 搜索列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $product = Product::where('name','like','%'.$keyword.'%')->paginate(config('params')['paginate']);
        return view('web.search.index', compact('product','keyword'));
    }

    /**
     * 关键词搜索
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function keywords(Request $request)
    {
        $id = $request->id;
        $keyword =  Keyword::find($id)->name;
        //$units = DB::table('thyroid_class_courses')->where(['site_id'=>$this->site_id,'is_show'=> 1])->whereRaw('FIND_IN_SET(?,keyword_id)', [$id])->paginate(20);
        return view('web.search.index', compact('units','keyword'));
    }


}
