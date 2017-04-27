
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

	$('#service-type,#btn-dropdown-type').on('click', function(event){
		event.stopPropagation();
		$('.drop-down').hide();
		$('#drop-type').toggle();
	})
	$('#service-type').on('click', function(event){
		event.stopPropagation();
		$('.drop-down').hide();
		$('#drop-type').toggle();
	})

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
　　	autoclose:true, //选择日期后自动关闭 
		startDate:new Date()
	});

	//点击预约
	$('#submit').click(function(){

		var name = $('#product-name').val()
	//	var type_id = service_type_id
		//TODO: 预约区域
		var hospital = $('#hospital').val()
		var department = $('#department').val()
		var date = $('#datetimepicker').val()
		var contact = $('#contact').val()
		var tel = $('#tel').val()
		var desc = $('#desc').val()

		if (name === ''){
			alert('请填写产品名称')
			return
		}
		if (type === ''){
			alert('请选择服务类型')
			return
		}
		if (date === ''){
			alert('请选择预约日期')
			return
		}
		if (contact === ''){
			alert('请填写联系人')
			return
		}
		if (tel === ''){
			alert('请填写联系电话')
			return
		}

		var data = {
			product_name : name,
		//	service_type_id : service_type_id,
			province : '',
			city : '',
			area : '',
			appoint_at : date,
			contact_name : contact,
			contact_phone : tel
		}

		if (hospital !== ''){
			data.hospital_name = hospital
		}
		if (department !== '') {
			data.departments = department
		}
		if (desc !== '') {
			data.comment = desc
		}

		$.ajax({
			url : '/market/store',
			type : 'post',
			data : data,
			success : function(data){
				if (data.message){
					alert(data.message)
				}
			}
		})
	})

});