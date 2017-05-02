<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;
use App\User;
use App\Models\CompanyImage;
use App\Models\OrderDepart;
use App\Models\OrderService;
use App\Models\OrderHospital;

/**
 * Class RequestHasTargetUser
 * @mixin Request
 */
trait RequestGetUser
{
    /**
     * @return User
     */
    public function getUserCompletion()
    {
        $user = User::select(['name','head_img','real_name','phone','sex','email','province','city'])->where(['id'=>\Auth::id()])->first()->toArray();
        $un_user = array_filter($user);
        return count($user)==count($un_user) ? true : false;
    }

    /**
     * @return User
     */
    public function getEnterpriseCompletion()
    {
        $data =  CompanyImage::select(['file_1','file_2','file_3','file_4','file_5','file_6','file_7','file_8','file_9','file_10','file_11'])->where(['user_id'=>\Auth::id()])->first();
        if($data)
            $data = $data->toArray();
        else
            $data=[];
        if($data)
        {
            $un_data = array_filter($data);
            $result =  count($data)==count($un_data) ? true : false;
        }
        else
            $result =false;
        return $result;
    }
    /**
     * @return User
     */
    public function getOrderCompletion()
    {
        $d_model = OrderDepart::where(['user_id'=>\Auth::id()])->first();
        $s_model = OrderService::where(['user_id'=>\Auth::id()])->first();
        $h_model = OrderHospital::where(['user_id'=>\Auth::id()])->first();
        if($d_model && $s_model && $h_model)
            return true;
        else
            return false;

    }
}