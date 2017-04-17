<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVideo;
use Illuminate\Http\Request;


class VideoController extends Controller
{
    /**
     * Data filtering.
     *
     * @return array
     */
    private function formatData(Request $request)
    {
        $data = [
            'qcloud_app_id' => $request->input('qcloud_app_id'),
            'qcloud_file_id' => $request->input('qcloud_file_id'),
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
        return view('admin.video.index', ['videos' => ProductVideo::paginate('20')]);
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
        return view('admin.video.edit', [
            'video' => ProductVideo::find($id)
        ]);
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
        $model = ProductVideo::find($id);
        $data = $this->formatData($request);
        $model->update($data);
        return redirect()->route('video.index');
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
        ProductVideo::find($id)->delete();
    }
}
