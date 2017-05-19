@extends('.admin._layouts.common')
@section('title')
    修改商品
@stop
@include('UEditor::head')
@section('main')
    <link rel="stylesheet" href="/admin/dist/css/select2.min.css" type="text/css" />
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>

    <script type="text/javascript" src="/admin/dist/js/select2.min.js"></script>
    <div class="admin-content" xmlns="http://www.w3.org/1999/html" style="height: auto">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">商品管理</strong> /
                <small>修改商品</small>
            </div>
        </div>

        <hr>
        <div class="am-g">
            <div class="am-u-sm-10">
                <form class="am-form am-form-horizontal" method="post" action="/admin/product/{{$product->id}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="am-form-group am-form-select">
                        <label for="doc-select-1" class="am-u-sm-3 am-form-label">所属分类</label>

                        <div class="am-u-sm-9">
                            <select id="category_id" name="category_id" required>
                                <option value="">==请选择分类==</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span class="am-form-caret"> </span>
                        </div>
                    </div>
                    <div class="am-form-group am-form-select">
                        <label for="doc-select-1" class="am-u-sm-3 am-form-label">关键词</label>
                        <div class="am-u-sm-9">
                            <select class="select_gallery-multiple" multiple="multiple" style="width:100%;" name="keyword_ids[]">
                                <optgroup label="请选择关键词">
                                    @foreach(\App\Models\Keyword::all() as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <span class="am-form-caret"> </span>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">商品名称</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="name" placeholder="商品名称" name="name" value="{{$product->name}}"
                                   required>
                            <small></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">商品权重</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="weight" placeholder="商品权重" name="weight"
                                   value="{{$product->weight}}">
                            <small>权重越大,排序越靠前</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">产品组成</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="attention" placeholder="请输入产品组成" name="attention"  value="{{$product->attention}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">适用范围</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="scope" placeholder="请输入适用范围" name="scope"  value="{{$product->scope}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">适用科室</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="office" placeholder="请输入科室" name="office" value="{{$product->office}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">适用部位</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="standard" placeholder="请输入适用部位" name="standard" value="{{$product->standard}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="default_spec" class="am-u-sm-3 am-form-label">产品规格</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="default_spec" placeholder="默认规格" name="default_spec"
                                   value="{{$product->default_spec}}" required>
                            <small></small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">注册证号</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="registration" placeholder="请输入注册证号" name="registration" value="{{$product->registration}}">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">生产企业</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="enterprise" placeholder="请输入生产企业" name="enterprise" value="{{$product->enterprise}}">
                        </div>
                    </div>
                    <div class="am-form-group" id="price">
                        <label for="user-name" class="am-u-sm-3 am-form-label">零售价格</label>

                        <div class="am-u-sm-6">
                            <input type="text" placeholder="商品价格" name="price" value="{{$product->price}}"
                                   required>
                            <small></small>
                        </div>

                        <div class="am-u-sm-3" id="add_spec">
                            <button type="button" class="am-btn am-btn-success" id="add-spec">
                                <span class="am-icon-plus"></span>添加规格
                            </button>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="weight" class="am-u-sm-3 am-form-label">库存</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="stock" placeholder="请输入库存,建议数字" name="stock"  value="{{$product->stock}}">
                        </div>
                    </div>
                    <div class="am-form-group"><label for="user-name" class="am-u-sm-3 am-form-label">联系方式</label>
                        <div class="am-u-sm-3"><input type="text" name="contact_name" value="{{$product->contact_name}}">
                        </div>
                        <div class="am-u-sm-3"><input type="text" name="contact_phone" value="{{$product->contact_phone}}">
                        </div>
                    </div>
                    @foreach($product->specifications as $spec)
                        <div class="am-form-group"><label for="user-name" class="am-u-sm-3 am-form-label">产品规格</label>

                            <div class="am-u-sm-3"><input type="text" value="{{$spec->specification_name}}" readonly>
                            </div>
                            <div class="am-u-sm-3"><input type="text" value="{{$spec->specification_price}}" readonly>
                            </div>
                            <div class="am-u-sm-3 am-btn-toolbar">
                                <a href="/admin/specification/{{$spec->id}}/edit"
                                   class="am-btn am-btn-primary am-btn-xs"><span
                                            class="am-icon-pencil"></span> 修改</a>
                                <a type="button" class="am-btn am-btn-danger am-btn-xs"
                                   id="delete{{ $spec->id }}" url="/admin/specification/"><span
                                            class="am-icon-remove"></span>
                                    删除</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="am-form-group am-form-file">
                        <label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">LOGO</label>

                        <div class="am-u-sm-9">
                            <input type="text" readonly="true" name="file_name" style="display: none;">
                            <button type="button" class="am-btn am-btn-default am-btn-sm" id="file_name"><i
                                        class="am-icon-cloud-upload"></i> 选择要上传的文件
                            </button>
                        </div>
                        <div class="am-u-sm-2" style="float: left">
                            <img class="am-img-thumbnail am-img-bdrs" src="{{$product->logo}}">

                        </div>
                        <input type="file" name="logo">
                    </div>

                    <div class="am-form-group am-form-file" id="banner">
                        <label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">Banner</label>

                        <div class="am-u-sm-9" id="add-banner">
                            <button type="button" class="am-btn am-btn-success" id="add-spec">
                                <span class="am-icon-plus"></span>BANNER
                            </button>
                        </div>
                    </div>

                    @if($product->banners)
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label"></label>
                            @foreach($product->banners as $banner)
                                <div class="am-u-sm-2" style="float: left">
                                    <img class="am-img-thumbnail am-img-bdrs" src="{{$banner->image_url}}">

                                    <a href="/admin/product-banner/{{$banner->id}}/edit"
                                       class="am-btn am-btn-primary am-btn-xs"><span
                                                class="am-icon-pencil"></span> 修改</a>
                                    <a type="button" class="am-btn am-btn-danger am-btn-xs"
                                       id="delete{{ $banner->id }}" url="/admin/product-banner/"><span
                                                class="am-icon-remove"></span>
                                        删除</a>

                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="am-form-group" id="tags">
                        <label for="user-name" class="am-u-sm-3 am-form-label">商品标签</label>

                        <div class="am-u-sm-9">
                            <input type="text" id="tag" placeholder="标签" name="tags" value="{{$product->tags}}">
                            <small>请用","隔开。例:"药械,糖尿病"</small>
                        </div>
                    </div>
                    @foreach($product->videos as $video)
                        <div class="am-form-group"><label for="user-name" class="am-u-sm-3 am-form-label">视频参数</label>

                            <div class="am-u-sm-3"><input type="text" value="{{$video->qcloud_app_id}}" readonly>
                            </div>
                            <div class="am-u-sm-3"><input type="text" value="{{$video->qcloud_file_id}}" readonly>
                            </div>
                            <div class="am-u-sm-3 am-btn-toolbar">
                                <a href="/admin/video/{{$video->id}}/edit"
                                   class="am-btn am-btn-primary am-btn-xs"><span
                                            class="am-icon-pencil"></span> 修改</a>
                                <a type="button" class="am-btn am-btn-danger am-btn-xs"
                                   id="delete{{ $video->id }}" url="/admin/video/"><span
                                            class="am-icon-remove"></span>
                                    删除</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="am-form-group am-form-file" id="video">
                        <label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">教育视频</label>

                        <div class="am-u-sm-1"  style="float: left">
                            <button type="button" class="am-btn am-btn-success" id="add-video">
                                <span class="am-icon-plus"></span>添加视频
                            </button>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">商品简介</label>

                        <div class="am-u-sm-9">
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="detail" type="text/plain">
                                {{$product->detail}}
                            </script>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">招商信息</label>

                        <div class="am-u-sm-9">
                            <!-- 加载编辑器的容器 -->
                            <script id="container2" name="description" type="text/plain">
                                {{$product->description}}
                            </script>
                        </div>
                    </div>
                    <div class="am-form-group am-form-select">
                        <label for="doc-select-1" class="am-u-sm-3 am-form-label">是否热销</label>
                        <div class="am-u-sm-9">
                            <select id="is_hot" name="is_hot">
                                <option value="0">否</option>
                                <option value="1">是</option>
                            </select>
                            <span class="am-form-caret"> </span>
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
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        $("#form-keyword_ide").select2();
        $(".select_gallery-multiple").select2();
        $(".select_gallery").select2();
        var ue = UE.getEditor('container');
        ue.ready(function () {

            var txt = ue.getContentTxt();
            ue.setContent(txt);
        });
        var ue2 = UE.getEditor('container2');
        ue2.ready(function () {
            var txt = ue2.getContentTxt();
            ue2.setContent(txt);
        });

        $("#category_id").val("{{$product->category_id}}");
        $("#supplier_id").val("{{$product->supplier_id}}");
        $("#activity_id").val("{{$product->activity_id}}");
        $("#is_on_sale").val("{{$product->is_on_sale}}");
        $("#is_hot").val("{{$product->is_hot}}");

        $('#add-spec').click(function () {
            var input = '<div class="am-form-group"><label for="user-name" class="am-u-sm-3 am-form-label">商品规格</label><div class="am-u-sm-4"><input type="text" placeholder="规格名称,例如[100g]" name="spec_name[]" required></div><div class="am-u-sm-4"><input type="text"  placeholder="规格对应价格商品价格" name="spec_price[]" required></div></div>';
            $('#price').after(input);
        });
        $('#add-video').click(function () {
            var input = '<div class="am-form-group"><label for="user-name" class="am-u-sm-3 am-form-label">视频参数</label><div class="am-u-sm-4"><input type="text" placeholder="请输入腾讯云app_id" name="qcloud_app_id[]" required></div><div class="am-u-sm-4"><input type="text"  placeholder="请输入腾讯云file_id" name="qcloud_file_id[]" required></div></div>';
            $('#tags').after(input);
        });

        $('input[type=file]').change(function () {
            console.log($(this).parent().parent());
            var $parent = $(this).parent();
            console.log($parent.find('.am-btn-default'));
            $parent.find('.am-btn-default').css('display', 'none');
            $parent.find('input[name=file_name]').css('display', 'block');
            $parent.find('input[name=file_name]').val($(this).val());
        });

        $('#add-banner').click(function () {
            var banner = '<div class="am-form-group am-form-file"><label for="doc-ipt-file-2" class="am-u-sm-3 am-form-label">Banner</label><div class="am-u-sm-9"><input type="text" readonly="true" name="file_name" style="display: none;"><button type="button" class="am-btn am-btn-default am-btn-sm" id="file_name"><i class="am-icon-cloud-upload"></i> 选择要上传的文件</button></div><input type="file" name="banner[]" required></div>';
            $('#banner').after(banner);

            $('input[type=file]').change(function () {
                console.log($(this).parent().parent());
                var $parent = $(this).parent();
                console.log($parent.find('.am-btn-default'));
                $parent.find('.am-btn-default').css('display', 'none');
                $parent.find('input[name=file_name]').css('display', 'block');
                $parent.find('input[name=file_name]').val($(this).val());
            });
        });

        $('input[type=file]').change(function () {
            console.log($(this).parent().parent());
            var $parent = $(this).parent();
            console.log($parent.find('.am-btn-default'));
            $parent.find('.am-btn-default').css('display', 'none');
            $parent.find('input[name=file_name]').css('display', 'block');
            $parent.find('input[name=file_name]').val($(this).val());
        });

        // 编辑初始化
        if($('#is_abroad').val()==0){
            $('#pricetax').hide();
        }
        else
            $('#pricetax').show();

        $('#is_abroad').change(function () {
            if($(this).val()==0){
                $('#pricetax').hide();
            }
            else
                $('#pricetax').show();
        })

        $(function () {
            $('[id^=delete]').on('click', function () {
                $('.am-modal-bd').text('您确定要删除?');
                id = this.id.slice(6);
                url = $(this).attr('url');
                $('#my-confirm').modal({
                    relatedTarget: this,
                    onConfirm: function (options) {
                        $.ajax({
                            url: url + id,
                            type: 'Delete',
                            dataType: 'text',
                            contentType: 'application/json',
                            async: true,
                            success: function (data) {
                                location.reload();
                            },
                            error: function (XMLResponse) {
                                console.log(XMLResponse.responseText);
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