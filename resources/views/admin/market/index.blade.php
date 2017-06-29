@extends('.admin._layouts.common')
@section('title')
    预约列表
@stop
@section('main')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">预约</strong> /
                <small>预约列表</small>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs empty-a">
                        <a href="/admin/supplier/create" type="button" class="am-btn am-btn-success"><span
                                    class="am-icon-plus"></span>新增</a>
                    </div>
                </div>
            </div>
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
                            <th class="table-id">ID</th>
                            <th class="table-title">商品名称</th>
                            <th class="table-type">联系人</th>
                            <th class="table-type">联系电话</th>
                            <th class="table-author am-hide-sm-only">预约时间</th>
                            <th class="table-date am-hide-sm-only">状态</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td><a href="#">{{$val->product_name}}</a></td>
                                <td>{{$val->contact_name}}</td>
                                <td class="am-hide-sm-only">{{$val->contact_phone}}</td>
                                <td class="am-hide-sm-only">{{$val->appoint_at}}</td>
                                <td class="am-hide-sm-only">@if ($val->status == 1)
                                        已审核
                                    @elseif ($val->status == 2)
                                        已预约
                                    @elseif ($val->status == 3)
                                        已完成
                                    @else
                                        已预约
                                    @endif</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a id="delete{{ $val->id }}" status="1"
                                               class="am-btn am-btn-xs am-btn-primary"><span
                                                        class="am-icon-pencil"></span> 审核</a>
                                            <a type="button" class="am-btn am-btn-danger"
                                               id="delete{{ $val->id }}" status="2"><span class="am-icon-primary"></span>
                                                预约</a>
                                            <a type="button" class="am-btn am-btn-primary"
                                               id="delete{{ $val->id }}" status="3"><span class="am-icon-check-circle"></span> 完成
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
            $('[id^=delete]').on('click', function () {
                $('.am-modal-bd').text('您确定要执行此次操作吗?');
                id = this.id.slice(6);
                status = $(this).attr('status');
                $('#my-confirm').modal({
                    relatedTarget: this,
                    onConfirm: function (options) {
                        $.ajax({
                            url: '/admin/market/update-status',
                            type: 'post',
                            data: {id:id,status:status},
                            async : false, //默认为true 异步
                            error:function(XMLResponse){
                                alert(XMLResponse.responseText);
                            },
                            success:function(data){
                                location.reload();
                            }
                            });
//                        $.ajax({
//                            url: '/admin/market/update-status',
//                            type: 'POST',
//                            data: {id:id,status:status},
//                            contentType: 'application/json',
//                            async: true,
//                            success: function (data) {
//                                location.reload();
//                            },
//                            error: function (XMLResponse) {
//                                alert(XMLResponse.responseText);
//                            }
//                        });
                    },
                    onCancel: function () {
                    }
                });
            });
        });
    </script>
@stop
