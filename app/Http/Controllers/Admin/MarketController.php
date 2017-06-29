<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceType;
use App\Models\Appointment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
class MarketController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.market.index', ['list' => Appointment::orderBy('id','desc')->paginate('30')]);
    }

    public function updateStatus(Request $request)
    {
        $model = Appointment::find($request->id);
        $model->status = $request->status;
        $model->save();
    }

}
