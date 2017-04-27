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
		$btn_save.find('span').text('已收藏');
		action = 0;
	} else {
		$btn_save.find('span').text('收藏');
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
				if (data.status === 1) {
					$btn_save.find('span').text(action === 0 ? '收藏' : '已收藏');
					if (action === 1) {
						$btn_save.addClass('save-focus');
						action = 0;
					} else {
						$btn_save.removeClass('save-focus');
						action = 1;
					}
				} else {
					sweetAlert(data.message);
				}
			}
		});
	});

	//缩略图切换
	var thumbs = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail');
	function setActive(thumb) {
		thumbs.removeClass('active');
		thumb.addClass('active');
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.big img').attr('src', thumb.data('url') + '?imageView2/1/w/450/h/450/q/90');
	}
	thumbs.on('mouseover', function (e) {
		setActive(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this));
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tab').eq(0).on('click', function () {
		var active = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail.active').prev();
		if (active.hasClass('thumbnail')) {
			setActive(active);
		} else {
			setActive(thumbs.last());
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.tab').eq(1).on('click', function () {
		var active = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.thumbnail.active').next();
		if (active.hasClass('thumbnail')) {
			setActive(active);
		} else {
			setActive(thumbs.first());
		}
	});

	//提交合作
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-submit').click(function () {
		var phone = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#phone').val();
		var name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name').val();
		if (name === '') {
			sweetAlert('请填写姓名');
			return;
		}
		if (phone === '') {
			sweetAlert('请填写联系电话');
			return;
		}
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
				sweetAlert(data.message);
			}
		});
	});
});

/***/ }),

/***/ 60:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

},[60]);