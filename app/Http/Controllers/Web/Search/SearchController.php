<?php

namespace App\Http\Controllers\Web\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Keyword;
use App\Models\ProductTag;
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
        $tags = ProductTag::select('id')->where('name','like','%'.$keyword.'%')->get()->toArray(); // 匹配,标签
        $keys = Keyword::select('id')->where('name','like','%'.$keyword.'%')->get()->toArray(); // 匹配关键词

        $count = Product::where('name','like','%'.$keyword.'%')->orwhereIn('tags', $tags)->orwhereIn('keyword_id', $keys)->count();
        $product = Product::where('name','like','%'.$keyword.'%')->orwhereIn('tags', $tags)->orwhereIn('keyword_id', $keys)->paginate(config('params')['paginate']);
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
        $tags = ProductTag::select('id')->where('name','like','%'.$keyword.'%')->get()->toArray(); // 匹配,标签

        $count =Product::whereRaw("FIND_IN_SET($id,keyword_id)")->orwhereIn('tags', $tags)->count();
        $product = Product::whereRaw("FIND_IN_SET($id,keyword_id)")->orwhereIn('tags', $tags)->paginate(config('params')['paginate']);
        return view('web.search.index', compact('product','keyword','count'));
    }


}
