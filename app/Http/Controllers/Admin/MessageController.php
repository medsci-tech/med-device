<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Data filtering.
     *
     * @return array
     */
    private function formatData(Request $request)
    {
        $data = [
            'name' => preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)|(\.)/",',',$request->input('name')),
            'content' => $request->input('content')
        ];
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.message.index', ['messages' => Message::paginate('5')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->formatData($request);
        $user_id = explode(',',$data['name']);
        if($data['name'])
        {
            foreach($user_id as $phone)
            {
                if($model = User::where(['phone'=>$phone])->first())
                {
                    $uid = $model->id;
                    Message::create(['user_id'=>$uid,'content'=>$data['content']]);
                }
            }
        }
        else
            $result = Message::create([
                'user_id' => 0,
                'content' => $request->input('content')
            ]);
        return redirect('/admin/message');
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
        return view('admin.message.edit', ['message' => Message::find($id)]);
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
