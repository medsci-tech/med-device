webpackJsonp([14],{

/***/ 2:
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
			var manager3 = new manager(departs, 2);
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
		url: '/get-service',
		success: function success(data) {
			service_types = data;
			var manager1 = new manager(service_types, 0);
		}
	});

	var data,
	    originData,
	    province = [],
	    cities = [],
	    hospitals = [];
	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.post({
		url: '/get-hospital',
		success: function success(data) {
			originData = {
				"code": 200,
				"status": 1,
				"message": "医院列表",
				"data": [{
					"id": 11069,
					"province": "湖北",
					"city": "武汉",
					"area": "蔡甸",
					"hospital": "武汉市蔡甸妇幼保健"
				}, {
					"id": 11072,
					"province": "湖南",
					"city": "武汉",
					"area": "东西湖",
					"hospital": "武汉兰青肿瘤医院"
				}, {
					"id": 11073,
					"province": "河北",
					"city": "武汉",
					"area": "东西湖",
					"hospital": "武汉明仁中医医院"
				}, {
					"id": 11088,
					"province": "湖北",
					"city": "宜昌",
					"area": "汉阳",
					"hospital": "武汉华西医院"
				}]
			};
		}
	}).then(function (asd) {
		console.log(asd);
		data = originData.data;
		for (var i = 0; i < data.length; i++) {
			if (!isRepeat(province, data[i].province)) {
				province.push(data[i].province);
			}
		}
		for (var i = 0; i < province.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div>' + province[i] + '</div>').addClass('item').click(function () {
				var provName = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.province span').text(provName);
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.city span').text("");
				filterCity(provName);
				filterHospital(provName);
				refreshCityBox();
				refreshHospitalBox();
			}).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.province .drop-item'));
		}
	});
	function filterCity(province) {
		cities = [];
		for (var i = 0; i < data.length; i++) {
			if (data[i].province === province && !isRepeat(cities, data[i].city)) {
				cities.push(data[i].city);
			}
		}
	}
	function filterHospital(province, city) {
		hospitals = [];
		if (city) {
			for (var i = 0; i < data.length; i++) {
				var dataItem = data[i];
				if (dataItem.province === province && dataItem.city === city && !isJsonArrRepeat(hospitals, 'hospital', dataItem.hospital)) {
					hospitals.push(dataItem);
				}
			}
		} else {
			for (var i = 0; i < data.length; i++) {
				var dataItem = data[i];
				if (dataItem.province === province && !isJsonArrRepeat(hospitals, 'hospital', dataItem.hospital)) {
					hospitals.push(dataItem);
				}
			}
		}
	}
	function isRepeat(arr, ele) {
		for (var i = 0; i < arr.length; i++) {
			if (arr[i] === ele) {
				return true;
			}
		}
		return false;
	}
	function isJsonArrRepeat(arr, key, ele) {
		for (var i = 0; i < arr.length; i++) {
			if (arr[i][key] === ele) {
				return true;
			}
		}
		return false;
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

	function refreshHospitalBox() {
		var container = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2 .items');
		container.empty();
		for (var i = 0; i < hospitals.length; i++) {
			var dataItem = hospitals[i];
			var item_hos = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item" data-json=' + JSON.stringify(dataItem) + '><span class="name">' + dataItem.hospital + '</span></div>');
			//			item_hos.data('province', dataItem.province).data('city', dataItem.city)
			//			item_hos.data(dataItem)
			var checkbox = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<input type="checkbox">').appendTo(item_hos);
			item_hos.click(function () {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('input').click();
			});
			checkbox.click(function () {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).click();
			});
			item_hos.appendTo(container);
		}
	}

	function refreshCityBox() {
		var container = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.city .drop-item');
		container.empty();
		for (var i = 0; i < cities.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div>' + cities[i] + '</div>').addClass('item').click(function () {
				var cityName = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).text();
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.city span').text(cityName);
				filterHospital(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.province span').text(), cityName);
				refreshHospitalBox();
			}).appendTo(container);
		}
	}

	//选择覆盖区域
	var container_appendHosItem = function container_appendHosItem(data) {
		var cancelBtn = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<span class="icon"><span class="icon2"></span></span>');
		var item = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item" style="display:block" data-json=' + JSON.stringify(data) + '><span class="inner">' + data.hospital + '</span></div>').append(cancelBtn).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2'));
		cancelBtn.click(function () {
			item.remove();
		});
	};
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2 .btn-panel').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2').empty();

		var $items = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.items .item');
		for (var i = 0; i < $items.length; i++) {
			if ($items.eq(i).children('input')[0].checked) {
				container_appendHosItem($items.eq(i).data('json'));
			}
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#hospital').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2').fadeIn();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder').show();
	});

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
			var item2 = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item"><span class="inner">' + this.data[i] + '</span></div>').append(cancelBtn).appendTo(this.container);
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
	var data = ['@163.com', '@sina.com', '@qq.com', '@126.com', '@vip.sina.com', '@gmail.com', '@hotmail.com', '@sohu.com', '@139.com'];
	initDom(data);
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('body').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.email-dropdown').hide();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('item-email').text('');
	});

	//==================表单提交===========================
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#submit').click(function () {
		var name = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#name').val();
		var email = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#email').val();
		var sex = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('input:radio[name="sex"]:checked').val();

		var _province, _city, _area;
		_province = _city = _area = "";
		var work_space = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#area').val().split(' - ');
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

		var data = {
			real_name: name,
			sex: sex,
			email: email,
			province: _province,
			city: _city,
			area: _area,
			depart_ids: _depart_ids,
			service_type_ids: _service_type_ids,
			hospitals: _hospitals
		};

		// $.ajax({
		// 	url : '/agent/agent-sign',
		// 	type : 'post',
		// 	data : data,
		// 	success : function(data){

		// 	}
		// })
	});
});

/***/ }),

/***/ 32:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(2);


/***/ })

},[32]);