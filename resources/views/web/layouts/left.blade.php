@section('css')

@endsection

<header class="header">
    头部
</header>
<li  ><a href="{{url('personal/collection')}}">我的收藏</a></li>
<li ><a href="{{url('personal/cooperation')}}">我的合作</a></li>
<li  ><a href="{{url('personal/appointment')}}">我的预约</a></li>
<li  ><a href="{{url('personal/info-edit')}}">基础信息修改</a></li>
<li  ><a href="{{url('personal/expertise')}}">个人专长</a></li>
<li  ><a href="{{url('personal/enterprise')}}">企业信息</a></li>
<li ><a href="{{url('personal/pwd-edit')}}">修改密码</a></li>

@yield('content')
        </div>



