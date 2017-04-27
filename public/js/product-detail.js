webpackJsonp([7],{

/***/ 10:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//tabs切换
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tabset-tab').on('mouseover', function () {
		if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hasClass('focus')) {
			return;
		}

		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.content').hide();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tabset-tab').removeClass('focus');
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).addClass('focus');

		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.content').eq(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tabset-tab').index(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this))).show();
	});

	//隐藏面板
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#btn-submit,.shielder,#panel img').on('click', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder,#panel').hide();
	});

	//弹出面板
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-business').on('click', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder,#panel').show();
	});

	//收藏按钮效果及数据上传
	var $btn_save = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#save'),
	    action = 1;
	if ($btn_save.hasClass('save-focus')) {
		$btn_save.text('已收藏');
		action = 0;
	} else {
		$btn_save.text('收藏');
		action = 1;
	}

	$btn_save.on('click', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/product/collect',
			type: 'post',
			data: {
				product_id: $product_id,
				action: action
			},
			success: function success(data) {
				console.log(data);
				if (data.status === 1) {
					$btn_save.text(action === 0 ? '收藏' : '已收藏').toggleClass('save-focus');
				} else {
					alert(data.message);
				}
			}
		});
	});

	//缩略图切换
	var index = 0;
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').eq(0).css('border', '2px solid #01a4e4');
	for (var i = 0; i < __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').length; i++) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').eq(i).data('index', i);
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').eq(i).on('click', function (i) {
			return function () {
				index = i;
				refresh(i);
			};
		}(i));
	}

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tab').eq(0).on('click', function () {
		if (index > 0) {
			index--;
			refresh(index);
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tab').eq(1).on('click', function () {
		if (index < __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').length - 1) {
			index++;
			refresh(index);
		}
	});

	function refresh(index) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.big img').attr('src', __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').eq(index).attr('style').substring(17));
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').css('border', 'none');
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail').eq(index).css('border', '2px solid #01a4e4');
	}

	//提交合作
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-submit').click(function () {
		var phone = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').val();
		var name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name').val();
		var join_type = '';
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.checkboxs input').each(function () {
			if (this.checked) {
				join_type += ',' + __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).attr('value');
			}
		});
		if (join_type != '') {
			join_type = join_type.substring(1);
		}

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/product/join',
			type: 'post',
			data: {
				contact_phone: phone,
				real_name: name,
				product_id: $product_id,
				join_type: join_type
			},
			success: function success(data) {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder,#panel').hide();
				alert(data.message);
			}
		});
	});
});

/***/ }),

/***/ 40:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

},[40]);