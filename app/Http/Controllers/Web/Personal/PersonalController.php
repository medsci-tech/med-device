<?php

namespace App\Http\Controllers\Web\Personal;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interfaces\CheckResetPwd;
use App\Http\Requests\Interfaces\CheckResetInfo;
use App\User;
use App\Models\OrderDepart;
use App\Models\OrderService;
use App\Models\OrderHospital;
use App\Models\Hospital;
use App\Http\Requests\Interfaces\CheckAgent;
use App\Http\Requests\Interfaces\RequestGetUser;
use App\Models\CompanyImage;
use App\Models\Appointment;
class PersonalController extends Controller
{
    use CheckResetPwd,CheckResetInfo,CheckAgent,RequestGetUser;

    public function index()
    {
        $use_completion = $this->getUserCompletion();
        $ent_completion = $this->getEnterpriseCompletion();
        $order_completion = $this->getOrderCompletion();
        return view('web.personal.index', ['use_completion' => $use_completion,'ent_completion' => $ent_completion,'order_completion' => $order_completion]);
    }
    /**
     * 个人收藏
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function collection()
    {
        $user = \Auth::user();
        $list = $user->collectionsWithProducts()->paginate(config('params')['paginate']);

        return view('web.personal.collection', ['list' => $list]);
    }
    /**
     * 个人合作列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function cooperation()
    {
        $user = \Auth::user();
        $list = $user->cooperationsWithProducts()->paginate(config('params')['paginate']);
        return view('web.personal.cooperation', ['list' => $list]);
    }
    /**
     * 预约列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function appointment(Request $request)
    {
        $user = \Auth::user();
        $status = $request->id;
        $where= ['status'=>$status,'user_id'=>$user->id];
        if($status===NULL)
            unset($where['status']);

        $count_arr = Appointment::select(\DB::raw('count(*) as count,status'))->where(['user_id'=>$user->id])->groupBy('status')->get()->toArray();
        $count_list= array_column($count_arr, 'count', 'status');
        $count = array_sum($count_list); //总数
        $list = Appointment::where($where)->paginate(config('params')['paginate']);
        return view('web.personal.appointment', compact('list','count','count_list','status'));
    }
    /**
     * 预约详情
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function appointmentDetail(Request $request)
    {
        try {
            $id = $request->id;
            $order = Appointment::find($id);
            try{
                $service_name =$order->service->name;
            }
            catch (\Exception $e) {
                $service_name = '';
            }
        }
        catch (\Exception $e) {
            abort(404);
        }
        return view('web.personal.appointment-detail', ['order' => $order,'service_name'=>$service_name]);
    }
    /**
     * 个人资料修改
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function infoEdit(Request $request)
    {
        if ($request->isMethod('post')) {
            $result =$this->CheckResetInfo($request->all());
            if($result['status'] ==1)
            {
                $user = \Auth::user();
                $user->real_name =$request->real_name;
                $user->province =$request->province;
                $user->city =$request->city;
                $user->area =$request->area;
                $user->sex =$request->sex;
                $user->email =$request->email;
                $user->save();
                return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
            }
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);
        }

        return view('web.personal.info-edit', ['data' => null]);
    }

    /**
     * 修改密码
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function pwdEdit(Request $request)
    {
        if ($request->isMethod('post')) {
            $result =$this->checkPhoneCode($request->all());
            if($result['status'] ==1)
            {
                $user = \Auth::user();
                $user->password = bcrypt($request->password);
                $user->save();
                return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
            }
            else
                return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);
        }

        return view('web.personal.pwd-edit', ['data' => null]);
    }

    /**
     * 个人专长
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function expertise(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();
            $data['real_name']=\Auth::user()->real_name;
            $data['province']=\Auth::user()->province;
            $data['city']=\Auth::user()->city;
            $data['sex']=\Auth::user()->sex;
            $data['email']=\Auth::user()->email;
            $result =$this->checkAgent($data);
            $data['user_id'] = \Auth::id();

            try {
                if($result['status'] ==1)
                {
                    /* 扩展科室 */
                    $depart_ids_arr = json_decode($request->depart_ids,true);
                    if(is_array($depart_ids_arr))
                    {
                        foreach($depart_ids_arr as $val)
                            OrderDepart::firstOrCreate(['depart_id' => $val['depart_id'],'user_id'=>\Auth::id()]);
                    }
                    /* 扩展服务 */
                    $service_type_ids_arr = json_decode($request->service_type_ids,true);
                    if(is_array($service_type_ids_arr))
                    {
                        foreach($service_type_ids_arr as $val)
                            OrderService::firstOrCreate(['service_type_id' => $val['service_type_id'],'user_id'=>\Auth::id()]);
                    }
                    /* 扩展医院 */
                    $hospitals_arr = json_decode($request->hospitals,true);
                    if(is_array($hospitals_arr))
                    {
                        foreach($hospitals_arr as $val)
                        {
                            $model = Hospital::firstOrCreate(['province'=>$val['province'],'city'=>$val['city'],'hospital'=>$val['hospital']]);
                            $hospital_id = $model->id;
                            OrderHospital::firstOrCreate(['hospital_id' => $hospital_id,'user_id'=>\Auth::id()]);
                        }
                    }
                    return response()->json(['code'=>200, 'status' => 1,'message' => '修改成功' ]);
                }
                else
                    return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);

            } catch (\Exception $e) {
                return response()->json(['code' => 200, 'status' => 0, 'message' => '服务器异常!']);
            }
        }
        return view('web.personal.expertise', ['data' => null]);
    }
    /**
     * 企业证书
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function enterprise(Request $request)
    {
        if ($request->isMethod('post')) {
            $file_id = $request->file_id;
            if(!$file_id)
                return response()->json(['code'=>200, 'status' => 0,'message' => '缺少file_id参数' ]);

            $file = $request->file('Filedata');
            if ($file->isValid()) {
                $url = \Helper::qiniuUpload($request->file('Filedata'));
                if($url)
                {
                    $model = CompanyImage::where(['user_id' => \Auth::id()])->first();
                    if($model)
                        CompanyImage::where(['user_id' => \Auth::id()])->update(['file_'.$file_id => $url]);
                    else
                        CompanyImage::create(['user_id'=>\Auth::id(),'file_'.$file_id => $url]);
                }
                else
                    return response()->json(['code'=>200, 'status' => 0,'message' => '上传失败' ]);

                return response()->json(['code'=>200, 'status' => 1,'message' => '上传成功','data'=>['url'=>$url.'?imageView2/1/w/150/h/150/q/90'] ]);
            } else
                return response()->json(['code'=>200, 'status' => 0,'message' => '上传失败' ]);
        }
        $data = CompanyImage::where(['user_id'=> \Auth::id()])->first();
        if($data)
            $data = $data->toArray();
        else
            $data=[];

        return view('web.personal.enterprise', ['data' => $data]);
    }
    /**
     * 个人图像上传
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function uploadHead(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {
            $url = \Helper::qiniuUpload($request->file('Filedata'));
            $user = \Auth::user();
            $user->head_img = $url;
            $user->save();
            return response()->json(['code'=>200, 'status' => 1,'message' => '上传成功','data'=>['head_img'=>$url.'?imageView2/1/w/150/h/150/q/90'] ]);
        } else
            return response()->json(['code'=>200, 'status' => 0,'message' => '上传失败' ]);
    }

    /**
     * 个人专长-科室
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function getDepart(Request $request)
    {
        $user = \Auth::user();
        $res = $user->ordersWithDeparts()->get();
        foreach($res as $order)
        {  echo $order->id.'?';
            foreach($order->departs as $val )
            {
            //echo $val->id;
            }
        }


    }

}
