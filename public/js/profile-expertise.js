webpackJsonp([3],{

/***/ 14:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//初始化数据
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
				if (dataItem.province === province && dataItem.city === city && !isRepeat(hospitals, dataItem.hospital)) {
					hospitals.push(dataItem.hospital);
				}
			}
		} else {
			for (var i = 0; i < data.length; i++) {
				var dataItem = data[i];
				if (dataItem.province === province && !isRepeat(hospitals, dataItem.hospital)) {
					hospitals.push(dataItem.hospital);
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
			var item_hos = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item"><span class="name">' + hospitals[i] + '</span></div>');
			var checkbox = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<input type="checkbox">').appendTo(item_hos);
			item_hos.click(function () {
				checkbox.click();
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
	var container_appendHosItem = function container_appendHosItem(title) {
		var cancelBtn = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<span class="icon"><span class="icon2"></span></span>');
		var item = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="item" style="display:block"><span class="inner">' + title + '</span></div>').append(cancelBtn).appendTo(__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2'));
		cancelBtn.click(function () {
			item.remove();
		});
	};
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2 .btn-panel').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container2').empty();

		var $items = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.items .item');
		for (var i = 0; i < $items.length; i++) {
			if ($items.eq(i).children('input')[0].checked) {
				container_appendHosItem($items.eq(i).children('.name').text());
			}
		}
	});
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#hospital').click(function () {
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel2').fadeIn();
		__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.shielder').show();
	});

	function manager(data, index) {
		this.data = data;
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

	var manager1 = new manager(['科室一', '科室二还是发卡机舒服还是', '科室三'], 0);
	var manager3 = new manager(['科室一', '科室二', '科室'], 2);
});

/***/ }),

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ })

},[44]);