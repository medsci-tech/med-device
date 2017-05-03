@extends('.admin._layouts.common')
@section('title')
    修改首页banner图
@stop
@include('UEditor::head')
@section('main')
    <div class="admin-content" xmlns="http://www.w3.org/1999/html" style="height: auto">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">商品规格管理</strong> /
                <small>修改banner图</small>
            </div>
        </div>

        <hr>
        <div class="am-g">
            <div class="am-u-sm-10">
                <form class="am-form am-form-horizontal" method="post"
                      action="/admin/banner/{{$banner->id}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put"/>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">banner权重</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="banner_name" placeholder="规格名称" name="weight"
                                   value="{{$banner->weight}}"
                                   required>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">banner链接</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="banner_name" placeholder="banner链接" name="href_url"
                                   value="{{$banner->href_url}}"
                                   required>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group am-form-file">
                        <label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">轮播图</label>

                        <div class="am-u-sm-9">
                            <input type="text" readonly="true" name="file_name" style="display: none;">
                            <button type="button" class="am-btn am-btn-default am-btn-sm" id="file_name"><i
                                        class="am-icon-cloud-upload"></i> 选择要上传的文件
                            </button>
                        </div>
                        <input type="file" id="doc-ipt-file-2" name="banner">
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label"></label>

                        <div class="am-u-sm-9">
                            <img class="am-img-thumbnail am-img-bdrs" src="{{$banner->image_url}}?imageView2/1/w/220/h/120/q/90" alt="">
                        </div>
                    </div>
                    <div class="am-form-group am-form-file">
                        <label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">背景图</label>

                        <div class="am-u-sm-9">
                            <input type="text" readonly="true" name="file_name2" style="display: none;">
                            <button type="button" class="am-btn am-btn-default am-btn-sm" id="file_name2"><i
                                        class="am-icon-cloud-upload"></i> 选择要上传的文件
                            </button>
                        </div>
                        <input type="file" id="doc-ipt-file-22" name="banner2" required>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label"></label>

                        <div class="am-u-sm-9">
                            <img class="am-img-thumbnail am-img-bdrs" src="{{ isset($banner->background_url) ? $banner->background_url : config('params')['default_image'] }}?imageView2/1/w/220/h/120/q/90" alt="">
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
    <script src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        $('input[type=file]').change(function () {
            console.log($(this).parent().parent());
            var $parent = $(this).parent();
            console.log($parent.find('.am-btn-default'));
            $parent.find('.am-btn-default').css('display', 'none');
            $parent.find('input[name=file_name]').css('display', 'block');
            $parent.find('input[name=file_name]').val($(this).val());
            $parent.find('input[name=file_name2]').css('display', 'block');
            $parent.find('input[name=file_name2]').val($(this).val());
        });
    </script>
@stop