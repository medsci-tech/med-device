webpackJsonp([3],{

/***/ 15:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

	//初始化数据
	//获取科室
	var toDelete = [];
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
			// deleteItem({
			// 	id : data.id,
			// 	type : 'hospital'
			// })
			toDelete.push({
				id: data.id,
				type: 'hospital'
			});
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
			var self = this;
			cancelBtn.on('click', function (i) {
				return function () {
					list1[i].toggleClass('item-chosen');
					list2[i].toggleClass('item-chosen');
					// if (self.index === 0){
					// 	deleteItem({
					// 		depart_id : self.json[i].depart_id,
					// 		type : 'depart'
					// 	})
					// } else {
					// 	deleteItem({
					// 		service_type_id : self.json[i].service_type_id,
					// 		type : 'service'
					// 	})
					// }
					// deleteItem({
					// 	id : self.index === 0 ? self.json[i].depart_id : self.json[i].service_type_id,
					// 	type : self.index === 0 ? 'depart' : 'service'
					// })
					toDelete.push({
						id: self.index === 0 ? self.json[i].depart_id : self.json[i].service_type_id,
						type: self.index === 0 ? 'depart' : 'service'
					});
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

	//==================表单提交===========================
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#submit').click(function () {
		var list = [];
		for (var i = 0; i < toDelete.length; i++) {
			list.push(deleteItem(toDelete[i]));
		}
		__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.when(list).done(function () {

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
				depart_ids: JSON.stringify(_depart_ids.map(function (d) {
					return { depart_id: d.depart_id };
				})),
				service_type_ids: JSON.stringify(_service_type_ids.map(function (s) {
					return { service_type_id: s.service_type_id };
				})),
				hospitals: JSON.stringify(_hospitals.map(function (h) {
					return { city: h.city, hospital: h.hospital, province: h.province };
				}))
			};
			console.log(data);
			__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
				url: '/personal/expertise',
				method: 'POST',
				data: data,
				success: function success(data) {
					sweetAlert(data.message);
				}
			});
		});
	});

	//获取个人专长数据
	var hospital_ids, department_ids, type_ids;
	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
		url: '/personal/get-hospital'
	}).then(function (data) {
		for (var i = 0; i < data.length; i++) {
			container_appendHosItem(data[i]);
		}
	});

	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
		url: '/personal/get-depart'
	}).then(function (data) {
		for (var i = 0; i < data.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container1 .item').each(function () {
				if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('json').name === data[i].name) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).addClass('item-chosen');
				}
			});
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel1 .item').each(function () {
				if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('span').text() === data[i].name) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).addClass('item-chosen');
				}
			});
		}
	});

	__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
		url: '/personal/get-service'
	}).then(function (data) {
		for (var i = 0; i < data.length; i++) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item-container3 .item').each(function () {
				if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).data('json').name === data[i].name) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).addClass('item-chosen');
				}
			});
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#panel3 .item').each(function () {
				if (__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).children('span').text() === data[i].name) {
					__WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).addClass('item-chosen');
				}
			});
		}
	});

	function deleteItem(item) {
		return __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.ajax({
			url: '/personal/del-expertise',
			type: 'post',
			data: item
		}).done(function (data) {
			console.log(data);
			if (data.status !== 1) {
				sweetAlert(data.message);
			}
		});
	}
});

/***/ }),

/***/ 66:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(15);


/***/ })

},[66]);