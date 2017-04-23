@extends('web.layouts.app')

@section('title', '首页')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/index.css">
@endsection

@section('page_js')
<script src="/js/index.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row nav">
            <a class="focus">&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;&nbsp;<div class="strip"></div></a>
            <a href="product">药械产品招商</a>
            <a href="market">药械营销服务</a>
            <a href="agent">药械经纪人</a>
    </div>
</div>
<div class="container-fluid">
    <div id="banner" class="row banner">
        <div class="col-md-offset-1 col-md-11">
            <h2>运输、贮存医疗器械，应当符合医疗器械说明书和标签标示的要求</h2>
            <p>家庭保健器材：疼痛按摩器材、家庭保健自我检测器材、血压计、电子体温表、多功能治疗仪、激光治疗仪、血糖仪、糖尿病治疗仪、视力改善器材、睡眠改善器材、口腔卫生健康用品、家庭紧急治疗产品；家庭用保健按摩产品：电动按摩椅/床;按摩棒;按摩捶;按摩枕;按摩靠垫;按摩腰带;气血循环机;足浴盆;足底按摩器</p>
            <div id="buttonset" class="buttonset">
                <div class="btn-banner" data-index='1'></div>
                <div class="btn-banner" data-index='2'></div>
                <div class="btn-banner" data-index='3'></div>
                <div class="btn-banner" data-index='4'></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row products">
            <div>
                <h2>热销产品</h2>
                <span class="link-all">所有产品></span>
            </div>
        @if($data)
            @foreach ($data as $val)
            <div class="col-md-2 item">

                <a href="{{ url('product/detail/'.$val->id) }}" target="_blank"><img src="{{ $val->logo }}?imageView2/1/w/220/h/220/q/90"></a><p>{{ $val->name }}</p>
                <span class="price-type">零售价格</span>
                <span class="price-num">{{ $val->price }}</span>
                <p>{{ $val->name }}</p>
            </div>
            @endforeach
        @endif
    </div>
</div>
<div class="container-fulid">
    <div class="row appointment">
        <h2>药械营销服务预约</h2>
        <a href="{{ url('market/marketing-order/') }}" target="_blank">查看详情></a>
    </div>
</div>
@endsection
