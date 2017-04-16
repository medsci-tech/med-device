@extends('.admin._layouts.common')
@section('title')
    修改教育视频
@stop
@include('UEditor::head')
@section('main')
    <div class="admin-content" xmlns="http://www.w3.org/1999/html" style="height: auto">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教育视频管理</strong> /
                <small>修改教育视频</small>
            </div>
        </div>

        <hr>
        <div class="am-g">
            <div class="am-u-sm-10">
                <form class="am-form am-form-horizontal" method="post"
                      action="{{ url('admin/video/'.$video->id) }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @if($video->product)
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">所属商品</label>

                            <div class="am-u-sm-9">
                                <input type="text" id="specification_name" placeholder="label" name="product_name"
                                       value="{{$video->product->name}}" readonly
                                       required>
                                <small></small>
                            </div>
                        </div>
                    @endif
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">腾讯云app_id</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="qcloud_app_id" placeholder="腾讯云app_id" name="qcloud_app_id"
                                   value="{{$video->qcloud_app_id}}"
                                   required>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">腾讯云file_id</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="qcloud_file_id" placeholder="腾讯云file_id" name="qcloud_file_id"
                                   value="{{$video->qcloud_file_id}}"
                                   required>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop