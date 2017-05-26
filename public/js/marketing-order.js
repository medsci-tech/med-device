webpackJsonp([10],{

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(8);


/***/ }),

/***/ 8:
/***/ (function(module, exports) {


$(document).ready(function () {

	//隐藏下拉框
	$('body').on('click', function () {
		$('.drop-down').hide();
	});

	//绑定下拉框显示事件
	// function bindShowEvent(triggerId, targetId) {

	// 	$('#' + triggerId).on('click', function (event) {
	// 		event.stopPropagation();
	// 		$('.drop-down').hide();
	// 		$('#' + targetId).toggle();
	// 	});
	// }
	// bindShowEvent('btn-dropdown-type', 'drop-type');
	// bindShowEvent('btn-dropdown-province', 'drop-province');
	// bindShowEvent('btn-dropdown-city', 'drop-city');
	// bindShowEvent('btn-dropdown-county', 'drop-county');

	$('#service-type,#btn-dropdown-type').on('click', function (event) {
		event.stopPropagation();
		$('.drop-down').hide();
		$('#drop-type').toggle();
	});
	$('#service-type').on('click', function (event) {
		event.stopPropagation();
		$('.drop-down').hide();
		$('#drop-type').toggle();
	});

	//填值
	// function autoValue(triggerId, targetId) {
	// 	$('#' + triggerId + ' li').on('click', function (e) {
	// 		$('#' + targetId).text($(e.target).text());
	// 	});
	// }
	// autoValue('drop-province', 'value-province');
	// autoValue('drop-city', 'value-city');
	// autoValue('drop-county', 'value-county');
	$('#drop-type li').on('click', function (e) {
		$('#service-type').val($(e.target).text());
	});

	$('#datetimepicker').datetimepicker({
		minView: "month", //选择日期后，不会再跳转去选择时分秒 
		format: "yyyy-mm-dd", //选择日期后，文本框显示的日期格式 
		language: 'zh-CN', //汉化 
		autoclose: true, //选择日期后自动关闭 
		startDate: new Date()
	});

	//点击预约
	$('#order-form').on('submit', function (e) {
		e.preventDefault();
		var name = this.name,
		    type = this.type,
		    area = this.area,
		    hospital = this.hospital,
		    department = this.department,
		    date = this.date,
		    realname = this.realname,
		    tel = this.tel,
		    desc = this.desc;

		// 	var name = $('#product-name').val()
		// //	var type_id = service_type_id
		// 	//TODO: 预约区域
		// 	var hospital = $('#hospital').val()
		// 	var department = $('#department').val()
		// 	var date = $('#datetimepicker').val()
		// 	var contact = $('#contact').val()
		// 	var tel = $('#tel').val()
		// 	var desc = $('#desc').val()

		if (!name.value.trim()) {
			sweetAlert('请填写产品名称');
			return;
		}
		if (!type.value.trim()) {
			sweetAlert('请选择服务类型');
			return;
		}
		if (!date.value) {
			sweetAlert('请选择预约日期');
			return;
		}
		if (!realname.value.trim()) {
			sweetAlert('请填写联系人');
			return;
		}
		if (!tel.value.trim()) {
			sweetAlert('请填写联系电话');
			return;
		}

		var _province, _city, _area;
		_province = _city = _area = "";
		var work_space = area.value.split(' - ');
		_province = work_space[0];
		if (work_space.length === 2) {
			_city = work_space[1];
		}
		if (work_space.length === 3) {
			_city = work_space[1];
			_area = work_space[2];
		}

		var data = {
			product_name: name.value,
			service_type_id: type.value,
			province: _province,
			city: _city,
			area: _area,
			appoint_at: date.value,
			contact_name: realname.value,
			contact_phone: tel.value
		};

		if (hospital.value.trim()) {
			data.hospital_name = hospital.value.trim();
		}
		if (department.value.trim()) {
			data.departments = department.value.trim();
		}
		if (desc.value.trim()) {
			data.comment = desc.value;
		}

		$.ajax({
			url: '/market/store',
			type: 'post',
			data: data,
			success: function success(data) {
				if (data.status === 1) {
					swal({
						title: '',
						text: '您已成功预约，我们将会尽快与您联系确认服务详情。<br><a href="/personal/appointment">查看详情</a>',
						html: true,
						type: 'success',
						showConfirmButton: false
					});
				} else {
					sweetAlert(data.message);
				}
			}
		});
	});
});

/***/ })

},[59]);