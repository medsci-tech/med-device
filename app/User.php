<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'password','real_name','sex','email','province','city','area','birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取指定用户的所有收藏
     */
    public function collections()
    {
        return $this->hasMany( \App\Models\Collection::class);
    }
    /**
     * 获取指定用户的所有合作
     */
    public function cooperations()
    {
        return $this->hasMany( \App\Models\Cooperation::class);
    }

    /**
     * 获取指定用户的所有科室
     */
    public function departs()
    {
       return $this->hasMany( \App\Models\OrderDepart::class,'user_id');
    }

    /**
     * @return mixed
     */
    public function ordersWithDeparts()
    {
        return $this->departs()->with(['departs' => function ($query) {
            $query->get();
        }]);
    }
    /**
     * 获取指定用户的所有服务类型
     */
    public function servicesTypes()
    {
        return $this->hasMany( \App\Models\OrderService::class,'user_id');
    }
    /**
     * @return mixed
     */
    public function ordersWithServices()
    {
        return $this->servicesTypes()->with(['serviceTypes' => function ($query) {
            $query->get();
        }]);
    }

    /**
     * 获取指定用户的所有医院
     */
    public function hospitals()
    {
        return $this->hasMany( \App\Models\OrderHospital::class,'user_id');
    }
    /**
     * @return mixed
     */
    public function ordersWithHospitals()
    {
        return $this->hospitals()->with(['hospitals' => function ($query) {
            $query->get();
        }]);
    }

    /**
     * @return mixed
     */
    public function collectionsWithProducts()
    {
        return $this->collections()->with(['products' => function ($query) {
            $query->get();
        }]);
    }

    /**
     * @return mixed
     */
    public function cooperationsWithProducts()
    {
        return $this->cooperations()->with(['products' => function ($query) {
            $query->get();
        }]);
    }


}
