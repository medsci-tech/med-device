webpackJsonp([22],{

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {

	function manager(data, index) {
		this.data = data;
		this.index = index;
		this.panel = $('.panel').eq(index);
		this.container = $('.item-container').eq(index);
		this.btn_choose = $('.btn-choose').eq(index);
		this.btn_panel = $('.btn-panel').eq(index);
		this.chosen = [];

		//初始化panel、container里的items
		var list1 = [];
		var list2 = [];
		for (var i = 0; i < this.data.length; i++) {
			//panel里的item
			var item1 = $('<div class="item"><span>' + this.data[i] + '</span></div>').appendTo(this.panel);
			//container里的item
			var cancelBtn = $('<span class="icon"><span class="icon2"></span></span>');
			var item2 = $('<div class="item"><span class="inner">' + this.data[i] + '</span></div>').append(cancelBtn).appendTo(this.container);
			list1.push(item1);
			list2.push(item2);

			//两种item的事件绑定
			item1.on('click', function (i) {
				return function () {
					$(this).toggleClass('item-chosen');
					list2[i].toggleClass('item-chosen');
				};
			}(i));
			cancelBtn.on('click', function (i) {
				return function () {
					list1[i].toggleClass('item-chosen');
					list2[i].toggleClass('item-chosen');
				};
			}(i));
		}

		//弹出选择面板
		var self = this;
		this.btn_choose.on('click', function () {
			self.panel.fadeIn();
			$('.shielder').show();
		});
	}

	//隐藏选择面板
	$('.panel img,.shielder,.btn-panel').on('click', function () {
		$('.shielder,.panel').hide();
	});

	var manager1 = new manager(['科室一', '科室二还是发卡机舒服还是', '科室三'], 0);
	var manager3 = new manager(['科室一', '科室二', '科室'], 2);

	//隐藏下拉框
	$('body').on('click', function () {
		$('.drop-down').slideUp(200);
	});

	//绑定下拉框显示事件
	function bindShowEvent(triggerId, targetId) {

		$('#' + triggerId).on('click', function (event) {
			event.stopPropagation();
			if ($('#' + targetId).css('display') === 'block') {
				$('.drop-down').slideUp(200);
			} else {
				$('.drop-down').slideUp(200);
				$('#' + targetId).toggle(200);
			}
		});
	}
	bindShowEvent('btn-dropdown-type', 'drop-type');
	bindShowEvent('btn-dropdown-province', 'drop-province');
	bindShowEvent('btn-dropdown-city', 'drop-city');
	bindShowEvent('btn-dropdown-county', 'drop-county');

	//填值
	function autoValue(triggerId, targetId) {
		$('#' + triggerId + ' li').on('click', function (e) {
			$('#' + targetId).text($(e.target).text());
		});
	}
	autoValue('drop-province', 'value-province');
	autoValue('drop-city', 'value-city');
	autoValue('drop-county', 'value-county');
	$('#drop-type li').on('click', function (e) {
		$('#service-type').val($(e.target).text());
	});

	//邮箱后缀
	$('#email').on('keyup', function(){
		$('.email-dropdown').show();

		var value = $('#email').val();
		var $items = $('.item-email');
		$items.each(function(){
			var index = value.indexOf('@');
			if (index !== -1){
				var str = value.substring(index);
				if ($(this).data('value').indexOf(str) === -1){
					$(this).hide();
				}
			} else {
				$(this).show();
				$(this).text(value + $(this).data('value'));
			}
		})
	})
	function initDom(data){
		for (var i = 0;i < data.length; i++){
			$('<div></div>').addClass('item-email').data('value', data[i]).css({
				width : '100%',
				height : '40px',
				lineHeight : '40px',
				paddingLeft : '10px',
				borderBottom : '1px solid #f2f2f2',
				overflow : 'hidden'
			}).click(function(){
				$('#email').val($(this).text());
			}).appendTo($('.email-dropdown'))
		}
	}
	var data = [
		'@163.com',
		'@sina.com',
		'@qq.com',
		'@126.com',
		'@vip.sina.com',
		'@gmail.com',
		'@hotmail.com',
		'@sohu.com',
		'@139.com',
	]
	initDom(data);
	$('body').click(function(){
		$('.email-dropdown').hide();
		$('item-email').text('');
	})

	//选择覆盖区域
	var hospitals = ['武汉同济医院', '武汉大学医院', '武汉大学附属医院', '武汉光谷医院', '武汉大学口腔医院']
	var panel_appendHosItem = function(title){
		var item_hos = $('<div class="item"><span class="name">' + title + '</span></div>')
		var checkbox = $('<input type="checkbox">').appendTo(item_hos)
		item_hos.click(function(){
			checkbox.click()
		})
		checkbox.click(function(){
			$(this).click()
		})
		item_hos.appendTo($('.items'))
	}
	var initHospitals = function(){
		for (var i = 0; i < hospitals.length; i++){
			panel_appendHosItem(hospitals[i])
		}
	}
	var container_appendHosItem = function(title){
		var cancelBtn = $('<span class="icon"><span class="icon2"></span></span>')
		var item = $('<div class="item" style="display:block"><span class="inner">' + title + '</span></div>').append(cancelBtn).appendTo($('#item-container2'))
	}
	$('#panel2 .btn-panel').click(function(){
		$('#item-container2').empty()

		var $items = $('.items .item');
		for (var i = 0; i < $items.length; i++) {
			if ($items.eq(i).children('input')[0].checked){
				container_appendHosItem($items.eq(i).children('.name').text())
			}
		}
	})
	$('#hospital').click(function () {
		$('#panel2').fadeIn();
		$('.shielder').show();
	});
	initHospitals()

});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 28:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 64:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
module.exports = __webpack_require__(28);


/***/ })

},[64]);
//# sourceMappingURL=broker-sign.js.map