@extends('.admin._layouts.common')
@section('title')
    专业特长列表
@stop
@section('main')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">专业特长</strong> /
                <small>专业特长列表</small>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs empty-a">
                        <a href="#" type="button" class="am-btn am-btn-success" onclick="history.back(-1);"><span
                                    class="am-icon-level-up"></span>返回</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title">用户名</th>
                            <th class="table-title">覆盖科室</th>
                            <th class="table-type">覆盖医院</th>
                            <th class="table-author am-hide-sm-only">擅长服务类型</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$depart}}</td>
                                <td class="am-hide-sm-only">
                                    @foreach ($hospital as $val)
                                        {{ $val['province']}}-{{ $val['city']}}-{{ $val['area']}}-{{ $val['hospital']}}<br>
                                    @endforeach
                                </td>
                                <td class="am-hide-sm-only">{{$services}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="am-cf">
                        <div class="am-fr">

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
                $('.am-modal-bd').text('您确定要删除?');
                id = this.id.slice(6);
                $('#my-confirm').modal({
                    relatedTarget: this,
                    onConfirm: function (options) {
                        $.ajax({
                            url: '/admin/message/' + id,
                            type: 'Delete',
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
