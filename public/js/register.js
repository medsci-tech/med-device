webpackJsonp([2],{16:function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=i(0),o=i.n(a);o()(function(){function e(e){e.children(".note").remove(),e.css("position","relative"),o()('<img src="/img/home/u44.png">').addClass("note").appendTo(e).css({position:"absolute",top:"14px",right:"-40px",width:"20px",whiteSpace:"nowrap"}),e.css("border-color","#d7d7d7")}function t(e,t){e.children(".note").remove(),e.css("position","relative"),o()('<div class="note"><img src="/img/home/u46.png"> '+t+"</div>").addClass("note").appendTo(e).css({position:"absolute",width:"20px",top:0,left:"440px",color:"red",zIndex:99,whiteSpace:"nowrap"}),e.css("border-color","red")}function i(i){var a=i.val(),n=a.indexOf("@");if(-1===n)return void t(o()("#email-box"),"邮箱格式不正确，请重新输入");var s=a.substring(n);if(".com"===s.substring(s.length-4)||".cn"===s.substring(s.length-3))return void e(o()("#email-box"));t(o()("#email-box"),"邮箱格式不正确，请重新输入")}var a=60;o()("#getCaptcha").click(function(){if(!(a<60)){if(""===o()("#phone").val())return void sweetAlert("请填写手机号");var e=o()(this);setTimeout(function(){e.text("发送中...")},100),o.a.ajax({url:"/send-code",type:"post",data:{phone:o()("#phone").val()},success:function(t){if(1===t.status)var i=setInterval(function(){a<=0?(e.text("获取验证码"),clearInterval(i),a=60):(a--,e.text(a+"秒后重新获取"))},1e3);else e.text("获取验证码"),sweetAlert(t.message)}})}}),o()("#submit").click(function(){var e=o()("#name").val(),t=o()("#password").val(),i=o()("#password_confirmation").val(),a=o()("#phone").val(),n=o()("#code").val(),s=o()('input[name="birthday"]').val();if(""===e)return void sweetAlert("请填写用户名");if(""===t)return void sweetAlert("请填写密码");if(""===i)return void sweetAlert("请填写密码确认");if(""===a)return void sweetAlert("请填写手机号");if(11!==a.length)return void sweetAlert("请填写正确的手机号");if(""===n)return void sweetAlert("请填写验证码");if(t!==i)return void sweetAlert("密码与密码确认不一致！");var r=o()("#real_name").val(),l=o()("#email").val(),c=o()("#agree")[0].checked,d=o()('input:radio[name="sex"]:checked').val();o.a.ajax({url:"/register",type:"post",data:{name:e,password:t,password_confirmation:i,phone:a,code:n,real_name:r,email:l,agree:c,birthday:s,sex:d},success:function(e){e.message&&sweetAlert(e.message),1===e.status&&location.replace("/personal")}})}),o()("#name").on("blur",function(){o.a.ajax({url:"/check-username",type:"post",data:{name:o()(this).val()},success:function(i){1===i.status?e(o()("#name-box")):t(o()("#name-box"),i.message)}})}),o()("#password_confirmation").on("blur",function(){o()(this).val()!==o()("#password").val()?t(o()("#confirm"),"两次密码输入不一致，请重新设置密码"):e(o()("#confirm"))}),o()("#email").on("blur",function(){i(o()(this))}),o()("#email").on("keyup",function(){o()(".email-dropdown").show();var e=o()("#email").val();o()(".item-email").each(function(){var t=e.indexOf("@");if(-1!==t){var i=e.substring(t);-1===o()(this).data("value").indexOf(i)&&o()(this).hide()}else o()(this).show(),o()(this).text(e+o()(this).data("value"))})});var n=["@qq.com","@163.com","@126.com","@sina.com","@hptmail.com","@gmail.com","@hotmail.com","@sohu.com","@21cn.com"];!function(e){for(var t=0;t<e.length;t++)o()("<div></div>").addClass("item-email").data("value",e[t]).css({width:"100%",height:"40px",lineHeight:"40px",paddingLeft:"10px",borderBottom:"1px solid #f2f2f2",overflow:"hidden"}).click(function(){o()("#email").val(o()(this).text()),i(o()("#email"))}).appendTo(o()(".email-dropdown"))}(n),o()("body").click(function(){o()(".email-dropdown").hide(),o()("item-email").text("")}),o()("#datetimepicker").datetimepicker({minView:"month",format:"yyyy-mm-dd",language:"zh-CN",autoclose:!0})})},67:function(e,t,i){e.exports=i(16)}},[67]);