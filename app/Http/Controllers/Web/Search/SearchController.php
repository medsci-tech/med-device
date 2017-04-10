<?php

namespace App\Http\Controllers\Web\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class SearchController extends Controller
{


    public function index(Request $request)
    {
        return view('web.search.index')->with([
            'result' => json_encode('test')
        ]);
    }




}
