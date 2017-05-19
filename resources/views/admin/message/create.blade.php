@extends('.admin._layouts.common')
@section('title')
    创建站内信
@stop
@include('UEditor::head')
@section('main')
    <div class="admin-content" xmlns="http://www.w3.org/1999/html" style="height: auto">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">站内信管理</strong> /
                <small>创建站内信</small>
            </div>
        </div>

        <hr>
        <div class="am-g">
            <div class="am-u-sm-10">
                <form class="am-form am-form-horizontal" method="post" action="/admin/message"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">接收者</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="name" placeholder="消息接收者输入手机号:多个用户使用逗号隔开,如果是群发请输入0" name="name"
                                   required>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">消息内容</label>

                        <div class="am-u-sm-9">
                            <textarea rows="3" cols="20" placeholder="消息内容" name="content" required></textarea>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary">创建站内信</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop