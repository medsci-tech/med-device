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
        $count = Product::where('name','like','%'.$keyword.'%')->count();
        $product = Product::where('name','like','%'.$keyword.'%')->paginate(config('params')['paginate']);
        return view('web.search.index', compact('product','keyword','count'));
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
        $count =Product::whereRaw("FIND_IN_SET($id,keyword_id)")->count();
        $product = Product::whereRaw("FIND_IN_SET($id,keyword_id)")->paginate(config('params')['paginate']);
        return view('web.search.index', compact('product','keyword','count'));
    }


}
