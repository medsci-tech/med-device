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
        $tagId = ProductTag::select('id')->where('name','like','%'.$keyword.'%')->first(); // 匹配,标签
        $tagId = $tagId ? $tagId->id : "''";

        $keysId = Keyword::select('id')->where('name','like','%'.$keyword.'%')->first(); // 匹配关键词
        $keysId = $keysId ? $keysId->id : "''";
        $count = Product::where('name','like','%'.$keyword.'%')->orWhereRaw("FIND_IN_SET($keysId,keyword_id)")->orWhereRaw("FIND_IN_SET($tagId,tags)")->count();
        $product = Product::where('name','like','%'.$keyword.'%')->orWhereRaw("FIND_IN_SET($keysId,keyword_id)")->orWhereRaw("FIND_IN_SET($tagId,tags)")->paginate(config('params')['paginate']);
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
        $tags = ProductTag::select('id')->where('name','like','%'.$keyword.'%')->first(); // 匹配,标签
        $tag_id = $tags ? $tags->id : "''";
        $count =Product::whereRaw("FIND_IN_SET($id,keyword_id)")->orWhereRaw("FIND_IN_SET($tag_id,tags)")->count();
        $product = Product::whereRaw("FIND_IN_SET($id,keyword_id)")->orWhereRaw("FIND_IN_SET($tag_id,tags)")->paginate(config('params')['paginate']);
        return view('web.search.index', compact('product','keyword','count'));
    }


}
