<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyImage;
use App\User;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.enterprise.index', ['list' => CompanyImage::paginate('20')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        CompanyImage::where('id', $id)->update(['status' => 2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->formatData($request);
        $user_id = explode(',',$data['name']);
        $message= Message::find($id);
        if($data['name'])
        {
            foreach($user_id as $phone)
            {
                if($model = User::where(['phone'=>$phone])->first())
                {
                    $uid = $model->id;
                    Message::updateOrCreate(['user_id'=>$uid],['user_id'=>$uid,'content'=>$data['content']]);
                }
            }
        }
        else
            $message->update(['user_id'=>0,'content'=>$data['content']]);

        \Session::flash('message', trans('suppliers.update_message'));
        return redirect()->route('message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = Message::find($id);
        $user->delete();
    }
}
