webpackJsonp([14],{5:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var c=n(0),o=n.n(c);o()(document).ready(function(){for(var t=0;t<o()(".nav-item").length;t++)o()(".nav-item").eq(t).on("click",function(t){return function(){o()(this).hasClass("focus")||(o()(".nav-item").removeClass("focus"),o()(this).addClass("focus")),o()(".content").hide(),o()(".content").eq(t).show()}}(t));o()(".nav-item:target").click(),o()(".footer-link").click(function(){o()("#"+o()(this).data("target")).click()})})},55:function(t,e,n){t.exports=n(5)}},[55]);