<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->user =  User::find($request->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($uid)
    {
        $depart = $this->getDepart();
        $depart = $depart ? implode(',',array_column($depart, 'name')) : '';

        $hospital = $this->getHospital();
        $services = $this->getService();
        $services = $depart ? implode(',',array_column($services, 'name')) : '';
        return view('admin.expertise.index', ['user' =>$this->user,'hospital'=>$hospital,'services'=>$services,'depart'=>$depart]);
    }


    /**
     * 个人专长-科室
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getDepart()
    {
        $res = $this->user->ordersWithDeparts()->get();
        $list =[];
        if($res)
        {
            try{
                foreach($res as $key=>$order)
                {
                    foreach($order->departs as $val )
                        $list[$key]=['name'=>$val->name];
                }
            }
            catch (\Exception $e) {
                $list = [];
            }
        }
        else
            $list = [];
        return $list;
    }

    /**
     * 个人专长-服务类型
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getService()
    {
        $res = $this->user->ordersWithServices()->get();
        $list =[];
        if($res)
        {
            try{
                foreach($res as $key=>$order)
                {
                    foreach($order->serviceTypes as $val )
                        $list[$key]=['name'=>$val->name];
                }
            }
            catch (\Exception $e) {
                $list = [];
            }
        }
        else
            $list = [];
        return $list;
    }

    /**
     * 个人专长-医院列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getHospital()
    {
        $res = $this->user->ordersWithHospitals()->get();
        $list =[];
        if($res)
        {
            try{
                foreach($res as $key=>$order)
                {
                    foreach($order->hospitals as $val )
                        $list[$key]=['hospital'=>$val->hospital,'province'=>$val->province,'city'=>$val->city,'area'=>$val->country];
                }
            }
            catch (\Exception $e) {
                $list = [];
            }
        }
        else
            $list = [];
        return $list;
    }

}
