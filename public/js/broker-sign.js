webpackJsonp([15],{

/***/ 3:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//初始化数据
	//获取科室
	var departs, service_types;
	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
		url: '/get-depart',
		success: function success(data) {
			departs = data;
			var manager1 = new manager(departs, 0);
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
		url: '/get-service',
		success: function success(data) {
			service_types = data;
			var manager3 = new manager(service_types, 2);
		}
	});

	var data,
	    originData,
	    province = "",
	    city = "",
	    hospitals = [];
	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.getJSON('/json/loc.json').then(function (data) {
		data = data;
		for (var i = 0; i < data.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div>' + data[i].name + '</div>').addClass('item').click(function () {
				var provName = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.province span').text(provName);
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.city span').text("");
				province = provName;
				refreshCityBox(data, provName);
			}).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.province .drop-item'));
		}
	});

	function refreshHospitalBox(prov, city) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/get-hospital',
			type: 'post',
			data: {
				province: prov,
				city: city
			}
		}).then(function (data) {
			if (data.status !== 1) {
				sweetAlert(data.message);
				return;
			}
			var container = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2 .items');
			container.empty();
			var hospital_list = data.data;
			for (var i = 0; i < hospital_list.length; i++) {
				var dataItem = hospital_list[i];
				var item_hos = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item" data-json=' + JSON.stringify(dataItem) + '><span class="name">' + dataItem.hospital + '</span></div>');
				var checkbox = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<input type="checkbox">').appendTo(item_hos);
				item_hos.click(function () {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('input').click();
				});
				checkbox.click(function () {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).click();
				});
				item_hos.appendTo(container);
			}
		});
	}

	function refreshCityBox(data, prov) {
		var container = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.city .drop-item');
		container.empty();
		for (var i = 0; i < data.length; i++) {
			if (data[i].name === prov) {
				var cities = data[i].cities;
				for (var j = 0; j < cities.length; j++) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div data-prov="' + prov + '">' + cities[j].name + '</div>').addClass('item').click(function () {
						var cityName = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text();
						__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.city span').text(cityName);
						city = cityName;
						refreshHospitalBox(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('prov'), cityName);
					}).appendTo(container);
				}
				break;
			}
		}
	}

	//医院名字筛选搜索
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.search-box').on('keyup', function () {
		var value = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).val();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.items .item').each(function () {
			var $name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('.name');
			console.log($name.text());
			if ($name.text().indexOf(value) === -1) {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hide();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('input')[0].checked = false;
			} else {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).show();
			}
		});
	});

	//省市下拉框事件
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.province,.city').click(function (event) {
		event.stopPropagation();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('.drop-item').slideToggle(160);
	});

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-item').slideUp(160);
	});

	//选择覆盖区域
	var container_appendHosItem = function container_appendHosItem(data) {
		var cancelBtn = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<span class="icon"><span class="icon2"></span></span>');
		var item = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item" style="display:block" data-json=' + JSON.stringify(data) + '><span class="inner">' + data.hospital + '</span></div>').append(cancelBtn).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2'));
		cancelBtn.click(function () {
			item.remove();
		});
	};
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2 .btn-panel').click(function () {
		var $items = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.items .item');
		for (var i = 0; i < $items.length; i++) {
			if ($items.eq(i).children('input')[0].checked && !isRepeat($items.eq(i).children('.name').text())) {
				container_appendHosItem($items.eq(i).data('json'));
			}
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#hospital').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2').fadeIn();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder').show();
	});

	//选择医院是否重复
	function isRepeat(name) {
		if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2 .inner').length === 0) {
			return false;
		}
		var is_repeat = false;
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2 .inner').each(function () {
			if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text() === name) {
				is_repeat = true;
			}
		});
		return is_repeat;
	}

	function manager(data, index) {
		this.json = data;
		this.data = this.json.map(function (obj) {
			return obj.name;
		});

		this.index = index;
		this.panel = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.panel').eq(index);
		this.container = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.item-container').eq(index);
		this.btn_choose = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-choose').eq(index);
		this.btn_panel = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-panel').eq(index);
		this.chosen = [];

		//初始化panel、container里的items
		var list1 = [];
		var list2 = [];
		for (var i = 0; i < this.data.length; i++) {
			//panel里的item
			var item1 = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item"><span>' + this.data[i] + '</span></div>').appendTo(this.panel);
			//container里的item
			var cancelBtn = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<span class="icon"><span class="icon2"></span></span>');
			var item2 = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item" data-json=' + JSON.stringify(this.json[i]) + '><span class="inner">' + this.data[i] + '</span></div>').append(cancelBtn).appendTo(this.container);
			list1.push(item1);
			list2.push(item2);

			//两种item的事件绑定
			item1.on('click', function (i) {
				return function () {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).toggleClass('item-chosen');
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
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder').show();
		});
	}

	//隐藏选择面板
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.panel img,.shielder,.btn-panel').on('click', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder,.panel').hide();
	});

	//隐藏下拉框
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').on('click', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-down').slideUp(200);
	});

	//绑定下拉框显示事件
	function bindShowEvent(triggerId, targetId) {

		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + triggerId).on('click', function (event) {
			event.stopPropagation();
			if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + targetId).css('display') === 'block') {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-down').slideUp(200);
			} else {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.drop-down').slideUp(200);
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + targetId).toggle(200);
			}
		});
	}
	bindShowEvent('btn-dropdown-type', 'drop-type');
	bindShowEvent('btn-dropdown-province', 'drop-province');
	bindShowEvent('btn-dropdown-city', 'drop-city');
	bindShowEvent('btn-dropdown-county', 'drop-county');

	//填值
	function autoValue(triggerId, targetId) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + triggerId + ' li').on('click', function (e) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#' + targetId).text(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target).text());
		});
	}
	autoValue('drop-province', 'value-province');
	autoValue('drop-city', 'value-city');
	autoValue('drop-county', 'value-county');
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#drop-type li').on('click', function (e) {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#service-type').val(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target).text());
	});

	//邮箱后缀
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').on('keyup', function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown').show();

		var value = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val();
		var $items = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.item-email');
		$items.each(function () {
			var index = value.indexOf('@');
			if (index !== -1) {
				var str = value.substring(index);
				if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('value').indexOf(str) === -1) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hide();
				}
			} else {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).show();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text(value + __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('value'));
			}
		});
	});
	function initDom(data) {
		for (var i = 0; i < data.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div></div>').addClass('item-email').data('value', data[i]).css({
				width: '100%',
				height: '40px',
				lineHeight: '40px',
				paddingLeft: '10px',
				borderBottom: '1px solid #f2f2f2',
				overflow: 'hidden'
			}).click(function () {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text());
			}).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown'));
		}
	}
	var email_data = ['@163.com', '@sina.com', '@qq.com', '@126.com', '@vip.sina.com', '@gmail.com', '@hotmail.com', '@sohu.com', '@139.com'];
	initDom(email_data);
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown').hide();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('item-email').text('');
	});

	//==================表单提交===========================
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#sign-form').on('submit', function (e) {
		e.preventDefault();
		var name = this.name.value.trim(),
		    email = this.email.value.trim(),
		    sex = this.sex.value;

		if (!name) {
			return sweetAlert('姓名不能为空');
		}
		if (!email) {
			return sweetAlert('邮箱不能为空');
		}

		var _province = void 0,
		    _city = void 0,
		    _area = void 0;
		_province = _city = _area = '';
		var work_space = this.area.value.split(' - ');
		_province = work_space[0];
		if (work_space.length === 2) {
			_city = work_space[1];
		}
		if (work_space.length === 3) {
			_city = work_space[1];
			_area = work_space[2];
		}

		var _hospitals = [],
		    _depart_ids = [],
		    _service_type_ids = [];
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2 .item').each(function () {
			_hospitals.push(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('json'));
		});
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container1 .item').each(function () {
			if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hasClass('item-chosen')) {
				_depart_ids.push(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('json'));
			}
		});
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container3 .item').each(function () {
			if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hasClass('item-chosen')) {
				_service_type_ids.push(__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('json'));
			}
		});

		var data = {
			real_name: name,
			sex: sex,
			email: email,
			province: _province,
			city: _city,
			area: _area,
			depart_ids: JSON.stringify(_depart_ids),
			service_type_ids: JSON.stringify(_service_type_ids),
			hospitals: JSON.stringify(_hospitals)
		};

		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/agent/agent-sign',
			type: 'post',
			data: data,
			success: function success(data) {
				if (data.status === 1) {
					swal({
						text: '\u6B22\u8FCE\u60A8\u6210\u4E3A\u836F\u68B0\u7ECF\u7EAA\u4EBA\uFF0C<a href="/">\u8FD4\u56DE\u9996\u9875</a>',
						html: true,
						type: 'success'
					});
				} else {
					swal({
						title: '',
						text: data.message,
						type: 'error'
					});
				}
			}
		});
	});
});

/***/ }),

/***/ 53:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(3);


/***/ })

},[53]);