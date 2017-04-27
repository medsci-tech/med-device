@extends('web.layouts.app')

@section('title','注册')

@section('page_css')
<link rel="stylesheet" type="text/css" href="style/register.css">
<link rel="stylesheet" type="text/css" href="/style/bootstrap-datetimepicker.min.css">
@endsection

@section('page_js')
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/register.js"></script>
@endsection

@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">默认Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="form-area">
  <h2 class="title">欢迎注册</h2>
  <form class="form">
    <div>
      <div class="required">*</div>
      <label>用户名</label>
      <input id="name" type="text" name="name" placeholder="您的账户名和登录名" required>
    </div>
    <div>
      <div class="required">*</div>
      <label>设置密码</label>
      <input id="password" type="password" name="password" placeholder="请输入密码" required>
    </div>
    <div>
      <div class="required">*</div>
      <label>确认密码</label>
      <input id="password_confirmation" type="password" name="password_confirmation" placeholder="请再次输入密码" required>
    </div>
    <div>
      <div class="required">*</div>
      <label>手机号</label>
      <input id="phone" type="text" name="phone" placeholder="建议使用常用手机" required>
    </div>
    <div class="captcha">
      <div class="required">*</div>
      <label>验证码</label>
      <input id="code" type="text" name="code" placeholder="请输入手机验证码" required>
      <div id="getCaptcha">获取验证码</div>
    </div>
    <div>
      <label>真实姓名</label>
      <input id="real_name" type="text" name="real_name" placeholder="请输入真实姓名">
    </div>
    <div class="no-border">
      <label for="gender" class="control-label input-group">性别</label>
      <div class="btn-group" data-toggle="buttons">
        
        <label class="btn btn-danger active">
            <input type="radio" name="gender" value="男">男</label>
        <label class="btn btn-success">
            <input type="radio" name="gender" value="女">女</label>
      </div>
    </div>
    <div>
      <label>电子邮箱</label>
      <input id="email" type="text" name="email" placeholder="请输入电子邮箱">
      <div class="email-dropdown"></div>
    </div>
    <div>
      <label>工作区域</label>
    </div>
    <div>
      <label>出生日期</label>
      <input id="datetimepicker" type="text" name="birthday" placeholder="年/月/日" data-date-format="yyyy-mm-dd">
      <div class="email-dropdown"></div>
    </div>
    <div class="no-border">
      <input id="agree" class="confirm-agree" type="checkbox" name="agree" checked>
      <span>我同意</span><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">药械通用户服务协议</a>
    </div>
    <div id="submit" class="submit" style="cursor: pointer;">注册</div>
    <p>已有账号？ <a href="login">请登录</a></p>
  </form>
</div>
@endsection

@section('panel')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          药械通用户服务协议
        </h4>
      </div>
      <div class="modal-body">
        用户注册协议<br><br>
《用户注册协议》（以下简称“本协议”）由【施康培医疗科技（武汉）有限公司】（以下简称“【施康培】”）在提供域名为【www.bestmedevice.com】（以下简称“药械通”或“本站”）的网站服务时与药械通用户达成的关于使用本站的各项规则、条款和条件。本协议在药械通用户接受注册时生效。 <br>
您在成为药械通用户前，必须仔细阅读并接受本协议中所述的所有规则、条款和条件，包括因被提及而纳入的条款和条件。强烈建议您阅读本协议时，同时阅读本协议中提及的其他网页所包含的内容，因为其可能包含对作为药械通用户的您适用的进一步条款和条件。 <br>

您点击本协议“同意以下协议，提交”按钮即视为您完全接受本协议，在点击之前请您再次确认已知悉并完全理解本协议的全部内容。<br><br>

一、  用户注册<br>
1.  用户注册是指用户登陆本站，按要求填写相关信息并确认同意履行相关用户协议的过程。用户因进行交易、获取有偿服务等而发生的所有应纳税赋由用户自行承担。 <br>
2.  注册用户必须是具有完全民事行为能力的自然人，或者是具有合法经营资格的实体组织。无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不应注册为本站用户。<br><br>
二、  商品/服务交易 <br>
用户在本站购买商品/服务时必须遵守以下条款： <br>
1.  用户在使用药械通服务时应遵守所有适用的中国法律、法规、条例和地方性法律的要求以及本协议及纳入本协议的所有其他条款和规则的规定。<br>
2.  用户注册成功后，可再行通过【 药械经纪人页面】登记成为经纪人，同时提交相应个人信息，经审核通过后成为经纪人用户，即可接收药械通派出的任务信息，相应订单信息将由系统自动生成。<br>
3.  本站上的商品/服务价格（价格范围、市场价）、数量、总库存、上架或下架状态等商品信息随时都有可能发生变动，本站不作特别通知。由于网站上商品信息的数量巨大，虽然本站会尽最大努力保证所浏览商品信息的准确性，但由于互联网技术因素等客观原因存在，本站网页显示的信息可能会有一定的滞后性或差错，对此情形您知悉并理解。<br>
4.  在您下订单购买商品或预约服务时，请您仔细确认所购商品/服务详细信息，包括名称、价格、数量、型号、规格、尺寸、联系地址、电话、收货人、预约上门服务时间、合作模式、资质要求等信息。接收人与用户本人不一致的，接收人的行为和意思表示视为用户的行为和意思表示，用户应对接收人的行为及意思表示的法律后果承担连带责任。<br>
5.  药械通有权在发现药械通网站上显示的商品/服务及订单明显错误或缺货的情况下，单方面撤回这些信息或撤销该订单。药械通保留对产品/服务订购数量的限制权。在用户下订单的同时，也同时承认了其已经达到购买所订商品的法定年龄或已取得了相应资质，并对其在订单中提供的所有信息的真实性负责。 <br>
6.  商品/服务价格和可获性都将在药械通网站上标明，送货费/上门服务费将另行结算，费用根据用户选择的送货方式/服务方式的不同而异。药械通有权随时更改这些信息而不做任何通知。 <br>
7.  除法律另有强制性规定外，双方约定如下：<br>
a)  本站上展示的服务和价格等信息仅仅是要约邀请，您下单时须填写您希望购买的服务数量、价款及支付方式、联系人、联系方式、联系地址（合同履行地点）、合同履行方式等内容；系统生成的订单信息是计算机信息系统根据您填写的内容自动生成的数据，仅是您向【施康培】发出的合同要约；<br>
b)  收到您的订单信息后，只有在将您在订单中订购的服务向您或指定联系人交付时（接受服务为准），方视为您与【施康培】之间就向您或指定联系人提供的服务建立了合同关系；<br>
c)  如果您在一份订单里订购了多份服务并且【施康培】只给您或指定联系人交付了部分服务时，您与【施康培】之间仅就实际向您或指定联系人提供的服务建立了合同关系；<br>
d)  只有在【施康培】实际向您或指定联系人提供了订单中订购的其他服务时，您和【施康培】之间就订单中该其他已实际向您或指定联系人提供的服务才成立合同关系。<br>
8.  在已确认用户订单后如发生意外的情况，包括但不限于由于供应商提价，税额变化引起的价格变化，或是由于网站的错误等造成价格变化等情况，药械通将会通过网站公告、订单页面、email或电话通知用户，并有权取消该订单。在药械通没有取消该订单的情况下，用户有权决定是否取消订单。 <br>
9.  用户下单后，商品（服务）将会发送到您或指定联系人所指定的接收端或邮箱等，所有在药械通列出的交付时间为参考时间，参考时间的计算是根据具体服务的处理过程和发送时间的基础上估计得出的，并不作为实际交付时间的承诺。因如下情况造成订单延迟或无法交付等，【施康培】不承担因延迟交付造成的相应责任：<br>
a)  用户提供的信息错误、接收端设备等原因导致的；<br>
b)  服务发送后无人查阅的；<br>
c)  情势变更因素导致的；<br>
d)  不可抗力因素导致的，例如：自然灾害、基础网络问题、突发战争、网络黑客等。<br>
三、  用户的权利和义务<br>
1.  用户享有如下权利<br>
a)  有权拥有其在药械通的用户名及密码，并有权使用自己的用户名及密码随时登陆本站。用户不得以任何形式转让或授权他人使用自己的药械通用户名。 <br>
b)  用户有权根据本协议的规定以及本站上发布的相关规则在本站上查询商品信息、发表使用体验、参与商品讨论、上传商品图片、参加药械通的有关活动，以及享受药械通提供的其它信息服务。<br> 
c)  用户有义务在注册时提供自己的真实资料，并保证诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及安全性，保证药械通可以通过上述联系方式与用户本人进行联系。同时，用户也有义务在相关资料实际变更时及时更新有关注册资料。用户保证不以他人资料在药械通进行注册和购买行为。 <br>
d)  用户应当保证在使用药械通购买商品过程中遵守诚实信用原则，不在购买过程中采取不正当行为，不扰乱网上交易的正常秩序。 <br>
e)  用户享有言论自由权利，并拥有适度修改、删除自己发表的言论的权利。 <br>
2.  本协议依据国家相关法律法规规章制定，用户同意严格遵守以下义务：<br>
a)  不得传输或发表：煽动抗拒、破坏宪法和法律、行政法规实施的言论，煽动颠覆国家政权，推翻社会主义制度的言论，煽动分裂国家、破坏国家统一的的言论，煽动民族仇恨、民族歧视、破坏民族团结的言论；<br>
b)  从中国大陆向境外传输资料信息时必须符合中国有关法规；<br>
c)  不得利用药械通从事洗钱、窃取商业秘密、窃取个人信息等违法犯罪活动；<br>
d)  不得干扰药械通的正常运转，不得侵入药械通及国家计算机信息系统；<br>
e)  不得传输或发表任何违法犯罪的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的、淫秽的、不文明的等信息资料；<br>
f)  不得传输或发表损害国家社会公共利益和涉及国家安全的信息资料或言论；<br>
g)  不得教唆他人从事本条所禁止的行为；<br>
h)  不得利用在药械通注册的账户进行牟利性经营活动；<br>
i)  不得发布任何侵犯他人著作权、商标权等知识产权或合法权利的内容；用户应关注并遵守药械通不时公布或修改的各类合法规则规定。用户须对自己在网上的言论和行为承担法律责任。<br>
四、  【施康培】的权利和义务<br>
1.  有义务在现有技术上维护平台服务的正常进行，并努力提升技术及改进技术，使网站服务更好进行。<br>
2.  对用户在注册使用本站中所遇到的与交易或注册有关的问题及反映的情况，应及时作出回复。<br>
3.  有义务对相关数据、所有的申请行为以及与咨询有关的其它事项进行审查。<br>
4.  有权对用户的注册数据进行查阅，发现注册数据中存在任何问题或怀疑，均有权向用户发出询问及要求改正的通知或者直接作出删除等处理。<br>
5.  如发现用户不符合本协议第一条之资格，其与【施康培】之间的服务协议自始无效，一经发现，【施康培】有权立即停止与该用户的交易、注销该用户，并追究其使用本站服务的一切法律责任。<br>
6.  对于用户在药械通预定服务中的不当行为或其它任何【施康培】认为应当终止服务的情况，【施康培】有权随时作出删除相关信息、终止服务提供等处理，而无须征得用户的同意，并追究相关法律责任。<br>
7.  系统因下列状况无法正常运作，使用户无法使用服务时，【施康培】不承担损害赔偿责任，该状况包括但不限于：<br>
a)  在药械通公告之系统停机维护期间。<br>
b)  电信设备出现故障不能进行数据传输的。<br>
c)  因台风、地震、海啸、洪水、停电、战争、恐怖袭击等不可抗力之因素， 造成系统障碍不能执行业务的。<br>
d)  由于黑客攻击、电信部门技术调整或故障、银行方面的问题等原因而造成 的服务中断或者延迟。<br>
8.  若用户未遵守以上规定的，药械通有权作出独立判断并采取暂停或关闭用户帐号等措施。<br>
五、  知识产权声明<br>
1.  用户一旦接受本协议，即表明该用户主动将其在任何时间段在药械通发表的任何形式的信息内容（包括但不限于客户评价、客户咨询、各类话题文章等信息内容）的财产性权利等任何可转让的权利，如著作权财产权（包括并不限于：复制权、发行权、出租权、展览权、表演权、放映权、广播权、信息网络传播权、摄制权、改编权、翻译权、汇编权以及应当由著作权人享有的其他可转让权利），全部独家且不可撤销地转让给【施康培】所有，用户同意【施康培】有权就任何主体侵权而单独提起诉讼。<br>
2.  本协议已经构成《中华人民共和国著作权法》及相关法律规定的著作财产权等权利转让书面协议，其效力及于用户在药械通上发布的任何受著作权法保护的作品内容，无论该等内容形成于本协议订立前还是本协议订立后。<br>
3.  用户同意并已充分了解本协议的条款，承诺不将已发表于药械通的信息，以任何形式发布或授权其它主体以任何方式使用（包括但限于在各类网站、媒体上使用）。<br>
4.  除法律另有强制性规定外，未经【施康培】明确的特别书面许可，任何单位或个人不得以任何方式非法地全部或部分复制、转载、引用、链接、抓取或以其他方式使用药械通的信息内容，否则，【施康培】有权追究其法律责任。<br>
5.  药械通所刊登的资料信息（诸如文字、图表、标识、按钮图标、图像声音文件片段、数字下载、数据编辑和软件），均是【施康培】或其内容提供者的财产，受中国和国际版权法的保护。药械通上所有内容的汇编是【施康培】的排他财产，受中国和国际版权法的保护。药械通上所有软件都是【施康培】或其关联公司或其软件供应商的财产，受中国和国际版权法的保护。<br>
六、  通知送达<br>
1.  本协议项下【施康培】对于用户所有的通知均可通过网页公告、电子邮件、系统通知、手机短信、电话或常规的信件传送等方式进行；该等通知于发送之日视为已送达收件人。<br>
2.  用户对于【施康培】的通知应当通过【施康培】对外正式公布的通信地址、传真号码、电子邮件地址等联系信息进行送达。<br>
七、  法律管辖和适用<br>
本协议的订立、执行和解释及争议的解决均应适用在中华人民共和国大陆地区适用之有效法律（但不包括其冲突法规则）。如发生本协议与适用之法律相抵触时，则这些条款将完全按法律规定重新解释，而其它有效条款继续有效。如缔约方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向【施康培】所在地有管辖权的法院提起诉讼。<br>
八、  其他<br>
1.  【施康培】尊重用户和消费者的合法权利，本协议及药械通上发布的各类规则、声明等其他内容，均是为了更好的、更加便利的为用户提供服务。药械通欢迎用户和社会各界提出意见和建议，【施康培】将虚心接受并适时修改本协议及药械通的各类规则。<br>
2.  【施康培】有权不时地对本协议及本站的内容进行修改，并在药械通公示，无须另行通知用户。在法律允许的最大限度范围内，【施康培】对本协议及药械通内容拥有解释权。

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
      </div>
    </div>
  </div>
</div>
@endsection

