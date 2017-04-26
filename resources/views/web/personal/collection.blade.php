@extends('web.layouts.left')

@section('title', '我的收藏')

@section('page_css')
<link rel="stylesheet" type="text/css" href="/style/profile-collect.css">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2 nav">
			<div class="item">
				<a class="button" href="/personal">
					<span class="img1"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;信息管理
				</a>
			</div>
			<div class="item">
				<a class="button focus">
					<span class="img2"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的收藏
				</a>
			</div>
			<div class="item">
				<a class="button" href="cooperation">
					<span class="img3"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的合作
				</a>
			</div>
			<div class="item">
				<a class="button" href="appointment">
					<span class="img4"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;我的预约
				</a>
			</div>
			<div class="item">
				<a class="button" href="pwd-edit">
					<span class="img5"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;修改密码
				</a>
			</div>
		</div>
		<div class="content col-md-8">
			<div class="mycollect">
				<div class="panel">我的收藏</div>
				@if($list)
					@foreach($list as $order)
						@foreach($order->products as $product)
				<div class="collect-item">
					<a class="pic" href="{{ url('product/detail/'.$product->id) }}" target="_blank"><img src="{{ $product->logo }}?imageView2/1/w/220/h/220/q/90"></a>
					<a class="link" href="{{ url('product/detail/'.$product->id) }}" target="_blank">{{ $product->name }}</a>
					<div class="btn-cancel">取消收藏</div>

				</div>
					@endforeach
					@endforeach
				@endif
				{{$list->links()}}
			</div>
		</div>
	</div>
@endsection

@section('page_js')
<script src="/js/profile-collect.js"></script>
	<script>
        $(document).ready(function() {
            $('.btn-cancle').click(function () {
				//var product_id = $(this).attr('product_id');
                swal({
                    title: "您确定要删除吗？",
                    text: "您确定要删除这条数据？",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    cancelButtonText: "取消操作",
                    confirmButtonText: "是的，我要取消收藏",
                    confirmButtonColor: "#ec6c62"
                }, function() {
                    $.post('/product/collect', {product_id: product_id,action:0}, function(data) {
                        if(data.status==1)
                            //location.reload();
						else
                            alert(data.message)
                        location.reload();
                    })
                });
            })
        })


	</script>
@endsection