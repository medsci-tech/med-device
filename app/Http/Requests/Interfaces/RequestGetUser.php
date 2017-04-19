<?php

namespace App\Http\Requests\Interfaces;
use App\Http\Requests\Request;
use App\User;

/**
 * Class RequestHasTargetUser
 * @mixin Request
 */
trait RequestGetUser
{
    /**
     * @return User
     */
    public function getUser()
    {
        return User::where('phone', $this->input('phone'))->firstOrFail();
    }
}