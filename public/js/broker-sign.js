webpackJsonp([15],{3:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=i(0),a=i.n(n);a()(function(){function t(t,e){a.a.ajax({url:"/get-hospital",type:"post",data:{province:t,city:e}}).then(function(t){if(1!==t.status)return void sweetAlert(t.message);var e=a()("#panel2 .items");e.empty();for(var i=t.data,n=0;n<i.length;n++){var s=i[n],o=a()('<div class="item" data-json='+JSON.stringify(s)+'><span class="name">'+s.hospital+"</span></div>"),c=a()('<input type="checkbox">').appendTo(o);o.click(function(){a()(this).children("input").click()}),c.click(function(){a()(this).click()}),o.appendTo(e)}})}function e(e,i){var n=a()(".city .drop-item");n.empty();for(var s=0;s<e.length;s++)if(e[s].name===i){for(var o=e[s].cities,c=0;c<o.length;c++)a()('<div data-prov="'+i+'">'+o[c].name+"</div>").addClass("item").click(function(){var e=a()(this).text();a()(".city span").text(e),h=e,t(a()(this).data("prov"),e)}).appendTo(n);break}}function i(t){if(0===a()("#item-container2 .inner").length)return!1;var e=!1;return a()("#item-container2 .inner").each(function(){a()(this).text()===t&&(e=!0)}),e}function n(t,e){this.json=t,this.data=this.json.map(function(t){return t.name}),this.index=e,this.panel=a()(".panel").eq(e),this.container=a()(".item-container").eq(e),this.btn_choose=a()(".btn-choose").eq(e),this.btn_panel=a()(".btn-panel").eq(e),this.chosen=[];for(var i=[],n=[],s=0;s<this.data.length;s++){var o=a()('<div class="item"><span>'+this.data[s]+"</span></div>").appendTo(this.panel),c=a()('<span class="icon"><span class="icon2"></span></span>'),r=a()('<div class="item" data-json='+JSON.stringify(this.json[s])+'><span class="inner">'+this.data[s]+"</span></div>").append(c).appendTo(this.container);i.push(o),n.push(r),o.on("click",function(t){return function(){a()(this).toggleClass("item-chosen"),n[t].toggleClass("item-chosen")}}(s)),c.on("click",function(t){return function(){i[t].toggleClass("item-chosen"),n[t].toggleClass("item-chosen")}}(s))}var l=this;this.btn_choose.on("click",function(){l.panel.fadeIn(),a()(".shielder").show()})}function s(t){t.children(".note").remove(),t.css("position","relative"),a()('<img src="/img/home/u44.png">').addClass("note").appendTo(t).css({position:"absolute",top:"14px",right:"-40px",width:"20px",whiteSpace:"nowrap"}),t.css("border-color","#d7d7d7")}function o(t,e){t.children(".note").remove(),t.css("position","relative"),a()('<div class="note"><img src="/img/home/u46.png"> '+e+"</div>").addClass("note").appendTo(t).css({position:"absolute",width:"20px",top:"12px",left:"440px",color:"red",zIndex:99,whiteSpace:"nowrap"}),t.css("border-color","red")}function c(t){var e=t.val(),i=e.indexOf("@");if(-1===i)return void o(a()("#email-box"),"邮箱格式不正确，请重新输入");var n=e.substring(i);if(".com"===n.substring(n.length-4)||".cn"===n.substring(n.length-3))return void s(a()("#email-box"));o(a()("#email-box"),"邮箱格式不正确，请重新输入")}var r,l;a.a.ajax({url:"/get-depart",success:function(t){r=t;new n(r,0)}}),a.a.ajax({url:"/get-service",success:function(t){l=t;new n(l,2)}});var p="",h="";a.a.getJSON("/json/loc.json").then(function(t){t=t;for(var i=0;i<t.length;i++)a()("<div>"+t[i].name+"</div>").addClass("item").click(function(){var i=a()(this).text();a()(".province span").text(i),a()(".city span").text(""),p=i,e(t,i)}).appendTo(a()(".province .drop-item"))}),a()(".search-box").on("keyup",function(){var t=a()(this).val();a()(".items .item").each(function(){var e=a()(this).children(".name");-1===e.text().indexOf(t)?(a()(this).hide(),a()(this).children("input")[0].checked=!1):a()(this).show()})}),a()(".province,.city").click(function(t){t.stopPropagation(),a()(this).children(".drop-item").slideToggle(160)}),a()("body").click(function(){a()(".drop-item").slideUp(160)});var d=function(t){var e=a()('<span class="icon"><span class="icon2"></span></span>'),i=a()('<div class="item" style="display:block" data-json='+JSON.stringify(t)+'><span class="inner">'+t.hospital+"</span></div>").append(e).appendTo(a()("#item-container2"));e.click(function(){i.remove()})};a()("#panel2 .btn-panel").click(function(){for(var t=a()(".items .item"),e=0;e<t.length;e++)t.eq(e).children("input")[0].checked&&!i(t.eq(e).children(".name").text())&&d(t.eq(e).data("json"))}),a()("#hospital").click(function(){a()("#panel2").fadeIn(),a()(".shielder").show()}),a()(".panel img,.shielder,.btn-panel").on("click",function(){a()(".shielder,.panel").hide()}),a()("#email").on("keyup",function(){a()(".email-dropdown").show();var t=a()("#email").val();a()(".item-email").each(function(){var e=t.indexOf("@");if(-1!==e){var i=t.substring(e);-1===a()(this).data("value").indexOf(i)&&a()(this).hide()}else a()(this).show(),a()(this).text(t+a()(this).data("value"))})});var u=["@163.com","@sina.com","@qq.com","@126.com","@vip.sina.com","@gmail.com","@hotmail.com","@sohu.com","@139.com"];!function(t){for(var e=0;e<t.length;e++)a()("<div></div>").addClass("item-email").data("value",t[e]).css({width:"100%",height:"40px",lineHeight:"40px",paddingLeft:"10px",borderBottom:"1px solid #f2f2f2",overflow:"hidden"}).click(function(){a()("#email").val(a()(this).text()),c(a()("#email"))}).appendTo(a()(".email-dropdown"))}(u),a()("body").click(function(){a()(".email-dropdown").hide(),a()("item-email").text("")}),a()("#email").on("blur",function(){c(a()(this))}),a()("#sign-form").on("submit",function(t){t.preventDefault();var e=this.name.value.trim(),i=this.email.value.trim(),n=this.sex.value;if(!e)return sweetAlert("姓名不能为空");if(!i)return sweetAlert("邮箱不能为空");var s=void 0,o=void 0,c=void 0;s=o=c="";var r=this.area.value.split(" - ");s=r[0],2===r.length&&(o=r[1]),3===r.length&&(o=r[1],c=r[2]);var l=[],p=[],h=[];a()("#item-container2 .item").each(function(){l.push(a()(this).data("json"))}),a()("#item-container1 .item").each(function(){a()(this).hasClass("item-chosen")&&p.push(a()(this).data("json"))}),a()("#item-container3 .item").each(function(){a()(this).hasClass("item-chosen")&&h.push(a()(this).data("json"))});var d={real_name:e,sex:n,email:i,province:s,city:o,area:c,depart_ids:JSON.stringify(p),service_type_ids:JSON.stringify(h),hospitals:JSON.stringify(l)};a.a.ajax({url:"/agent/agent-sign",type:"post",data:d,success:function(t){1===t.status?swal({title:"",text:'欢迎您成为药械经纪人，<a href="/">返回首页</a>',html:!0,type:"success",showConfirmButton:!1}):swal({title:"",text:t.message,type:"error"})}})}),a()("#datetimepicker").datetimepicker({minView:"month",format:"yyyy-mm-dd",language:"zh-CN",autoclose:!0})})},53:function(t,e,i){t.exports=i(3)}},[53]);