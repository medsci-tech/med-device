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
        'name','phone', 'email', 'password','real_name','sex','email','province','city','area'
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
