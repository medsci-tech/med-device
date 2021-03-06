@extends('.admin._layouts.common')
@section('title')
    编辑供应商信息
@stop
@section('main')
    <div class="admin-content" xmlns="http://www.w3.org/1999/html">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">供应商</strong> /
                <small>编辑供应商信息</small>
            </div>
        </div>

        <hr>
        <div class="am-g">
            <div class="am-u-sm-10">
                <form class="am-form am-form-horizontal" method="post" action="/admin/supplier/{{$supplier->id}}">
                    <input type="hidden" name="_method" value="put"/>
                    {{ csrf_field() }}
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">供应商名称</label>
                        {{ csrf_field() }}
                        <div class="am-u-sm-9">
                            <input type="text" id="supplier_name" placeholder="供应商名称" name="supplier_name"
                                   value="{{$supplier->supplier_name}}" required>
                            <small>输入你的名字，让我们记住你。</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">联系电话</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="supplier_name" placeholder="联系电话" name="phone"  value="{{$supplier->phone}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">供应商简介</label>

                        <div class="am-u-sm-9">
                            <textarea class="" rows="5" id="supplier_desc" placeholder="供应商简介"
                                      name="supplier_desc" required>{{$supplier->supplier_desc}}</textarea>
                            <small>250字以内写出你的一生...</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label"></label>

                        <div class="am-u-sm-9">
                            <img class="am-img-thumbnail am-img-bdrs" src="{{$supplier->logo_image_url}}" alt="">
                        </div>
                    </div>
                    <div class="am-form-group am-form-file">
                        <label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">供应商形象照</label>

                        <div class="am-u-sm-9">
                            <input type="text" readonly="true" name="logo_image_url" style="display: none;">
                            <button type="button" class="am-btn am-btn-default am-btn-sm" id="logo_image_url"><i
                                        class="am-icon-cloud-upload"></i> 选择要上传的文件
                            </button>
                        </div>
                        <input type="file" id="doc-ipt-file-2" name="banner">
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