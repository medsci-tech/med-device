@extends('.admin._layouts.common')
@section('title')
    企业认证列表
@stop
@section('main')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">企业认证</strong> /
                <small>企业认证列表</small>
            </div>
        </div>

        <div class="am-g">
            {{--<div class="am-u-sm-12 am-u-md-8">--}}
            {{--<div class="am-input-group am-input-group-sm">--}}
            {{--<input type="text" class="am-form-field">--}}
            {{--<span class="am-input-group-btn">--}}
            {{--<button class="am-btn am-btn-default" type="button">搜索</button>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title">用户</th>
                            <th class="table-title">营业执照</th>
                            <th class="table-title">开户许可证</th>
                            <th class="table-type">医疗器械许可证</th>
                            <th class="table-type">开票信息 </th>
                            <th class="table-title">受托人身份证正</th>
                            <th class="table-title">受托人身份证反</th>
                            <th class="table-title">印章备案表</th>
                            <th class="table-title">企业法人委托书</th>
                            <th class="table-title">发票和出库单</th>
                            <th class="table-title">企业公示信息</th>
                            <th class="table-title">质保协议</th>
                            <th class="table-title">审核状态</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $key=> $val)
                            <tr>
                                <td>{{ \App\User::find($val['user_id'])->name }}</td>
                                <td><a href="{{$val['file_1']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_1']) ? $val['file_1'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_2']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_2']) ? $val['file_2'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_3']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_3']) ? $val['file_3'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_4']}}" target="_blank"><img  width="50" height="40" src="{{ $val['file_4'] ? $val['file_4'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_5']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_5']) ? $val['file_5'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_6']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_6']) ? $val['file_6'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_7']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_7']) ? $val['file_7'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_8']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_8']) ? $val['file_8'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_9']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_9']) ? $val['file_9'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_10']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_10']) ? $val['file_10'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td><a href="{{$val['file_11']}}" target="_blank"><img  width="50" height="40" src="{{ ($val['file_11']) ? $val['file_11'] : config('params')['default_image'] }}?imageView2/1/w/100/h/25/q/100"></a></td>
                                <td>@if ($val['status'] !=2)
                                        未通过
                                    @else
                                       <font color="blue">已通过</font>
                                    @endif</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">

                                            {{--<a type="button" class="am-btn am-btn-danger"--}}
                                               {{--id="delete{{ $val->id }}"><span class="am-icon-remove"></span>--}}
                                                {{--删除</a>--}}
                                            <a type="button" class="am-btn am-btn am-btn-xs am-btn-primary"
                                               id="pass{{ $val->id }}" data-id="{{ $val->id }}"><span class="am-icon-check-circle"></span> 审核
                                                </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="am-cf">
                        <div class="am-fr">
                            {{$list->render() }}
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
    <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
        <div class="am-modal-dialog">
            <div class="am-modal-bd">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-confirm>是</span>
                <span class="am-modal-btn" data-am-modal-cancel>否</span>
            </div>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
        window.onload = function () {
            paginations = document.getElementsByClassName('pagination');
            paginations[0].className = 'am-pagination';
            disabled = document.getElementsByClassName('disabled');
            if (disabled[0]) {
                disabled[0].className = 'am-disabled';
            }
            paginations = document.getElementsByClassName('active');
            paginations[0].className = 'am-active';
        }

        $(function () {
            $('[id^=pass]').on('click', function () {
                $('.am-modal-bd').text('您确定要审核通过吗?');
                id = $(this).attr('data-id');
                $('#my-confirm').modal({
                    relatedTarget: this,
                    onConfirm: function (options) {
                        $.ajax({
                            url: '/admin/enterprise/' + id+'/edit',
                            type: 'GET',
                            dataType: 'text',
                            contentType: 'application/json',
                            async: true,
                            success: function (data) {
                               location.reload();
                            },
                            error: function (XMLResponse) {
                                alert(XMLResponse.responseText);
                            }
                        });
                    },
                    onCancel: function () {
                    }
                });
            });
        });
    </script>
@stop
