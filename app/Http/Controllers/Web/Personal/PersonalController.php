<?php

namespace App\Http\Controllers\Web\Personal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PersonalController extends Controller
{

    public function index()
    {

        return view('web.personal.index', ['data' => null]);
    }

    public function collection()
    {
        $res = \App\User::find(\Auth::id())->collections;
        foreach ($res as $role) {
          
        }

        return view('web.personal.collection', ['data' => null]);
    }

    public function cooperation()
    {

        return view('web.personal.cooperation', ['data' => null]);
    }

    public function appointment()
    {

        return view('web.personal.appointment', ['data' => null]);
    }
    public function appointmentDetail()
    {

        return view('web.personal.appointment-detail', ['data' => null]);
    }
    public function infoEdit()
    {

        return view('web.personal.info-edit', ['data' => null]);
    }
    public function pwdEdit()
    {

        return view('web.personal.pwd-edit', ['data' => null]);
    }

    public function expertise()
    {

        return view('web.personal.expertise', ['data' => null]);
    }
    public function enterprise()
    {

        return view('web.personal.enterprise', ['data' => null]);
    }

}
