webpackJsonp([6],{

/***/ 18:
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
			var item2 = $('<div class="item"></div>').text(this.data[i]).append(cancelBtn).appendTo(this.container);
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
			self.panel.show();
			$('.shielder').show();
		});
	}

	//隐藏选择面板
	$('.panel img,.shielder,.btn-panel').on('click', function () {
		$('.shielder,.panel').hide();
	});

	var manager1 = new manager(['科室一', '科室二', '科室三'], 0);
	var manager2 = new manager(['科室四', '科室五', '科室六'], 1);
	var manager3 = new manager(['科室一', '科室二', '科室'], 2);
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 44:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 80:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(18);
module.exports = __webpack_require__(44);


/***/ })

},[80]);
//# sourceMappingURL=profile-expertise.js.map