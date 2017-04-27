import $ from 'jquery'

$(function () {

	//初始化数据
	//获取科室
	var departs,service_types
	$.ajax({
		url : '/get-depart',
		success : function(data){
			departs = data
			var manager1 = new manager(departs, 0);
		}
	})
	$.ajax({
		url : '/get-service',
		success : function(data){
			service_types = data
			var manager3 = new manager(service_types, 2);
		}
	})

	var data, originData, province = "", city = "", hospitals = []
	$.getJSON('/json/loc.json').then(function(data){
		data = data;
		for (var i = 0; i < data.length; i++) {
			$('<div>' + data[i].name + '</div>').addClass('item').click(function(){
				var provName = $(this).text()
				$('.province span').text(provName)
				$('.city span').text("")
				province = provName
				refreshCityBox(data, provName)
			}).appendTo($('.province .drop-item'))
		}
	})

	function refreshHospitalBox(prov, city){
		$.ajax({
			url : '/get-hospital',
			type : 'post',
			data : {
				province : prov,
				city : city
			}
		}).then(function(data){
			if (data.status !== 1){
				alert(data.message)
				return
			}
			var container = $('#panel2 .items')
			container.empty()
			var hospital_list = data.data
			for (var i = 0; i < hospital_list.length; i++){
				var dataItem = hospital_list[i]
				var item_hos = $('<div class="item" data-json=' + JSON.stringify(dataItem) + '><span class="name">' + dataItem.hospital + '</span></div>')
				var checkbox = $('<input type="checkbox">').appendTo(item_hos)
				item_hos.click(function(){
					$(this).children('input').click()
				})
				checkbox.click(function(){
					$(this).click()
				})
				item_hos.appendTo(container)
			}
		})
	}

	function refreshCityBox(data, prov){
		var container = $('.city .drop-item')
		container.empty()
		for (var i = 0; i < data.length; i++) {
			if (data[i].name === prov){
				var cities = data[i].cities
				for (var j = 0; j < cities.length; j++) {
					$('<div data-prov="' + prov + '">' + cities[j].name + '</div>').addClass('item').click(function(){
						var cityName = $(this).text()
						$('.city span').text(cityName)
						city = cityName
						refreshHospitalBox($(this).data('prov'), cityName)
					}).appendTo(container)
				}
				break
			}
		}
	}

	//医院名字筛选搜索
	$('.search-box').on('keyup', function(){
		var value = $(this).val()
		$('.items .item').each(function(){
			var $name = $(this).children('.name')
			console.log($name.text())
			if ($name.text().indexOf(value) === -1){
				$(this).hide()
				$(this).children('input')[0].checked = false
			} else {
				$(this).show()
			}
		})
	})

	//省市下拉框事件
	$('.province,.city').click(function(event){
		event.stopPropagation()
		$(this).children('.drop-item').slideToggle(160)
	})

	$('body').click(function(){
		$('.drop-item').slideUp(160)
	})

	//选择覆盖区域
	var container_appendHosItem = function(data){
		var cancelBtn = $('<span class="icon"><span class="icon2"></span></span>')
		var item = $('<div class="item" style="display:block" data-json=' + JSON.stringify(data) + '><span class="inner">' + data.hospital + '</span></div>').append(cancelBtn).appendTo($('#item-container2'))
		cancelBtn.click(function(){
			item.remove()
		})
	}
	$('#panel2 .btn-panel').click(function(){
		var $items = $('.items .item');
		for (var i = 0; i < $items.length; i++) {
			if ($items.eq(i).children('input')[0].checked && !isRepeat($items.eq(i).children('.name').text())){
				container_appendHosItem($items.eq(i).data('json'))
			}
		}
	})
	$('#hospital').click(function () {
		$('#panel2').fadeIn();
		$('.shielder').show();
	});

	//选择医院是否重复
	function isRepeat(name){
		if ($('#item-container2 .inner').length === 0){
			return false
		}
		$('#item-container2 .inner').each(function(){
			var asd = $(this).text()
			if ($(this).text() === name){
				return true
			}
		})
		return false
	}







	function manager(data, index) {
		this.json = data;
		this.data = this.json.map(function(obj){
			return obj.name
		});

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
			var item2 = $('<div class="item" data-json=' + JSON.stringify(this.json[i]) + '><span class="inner">' + this.data[i] + '</span></div>').append(cancelBtn).appendTo(this.container);
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
	var email_data = [
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
	initDom(email_data);
	$('body').click(function(){
		$('.email-dropdown').hide();
		$('item-email').text('');
	})

	//==================表单提交===========================
	$('#submit').click(function(){
		var name = $('#name').val()
		var email = $('#email').val()
		var sex = $('input:radio[name="sex"]:checked').val()

		var _province,_city,_area
		_province = _city = _area = "";
		var work_space = $('#area').val().split(' - ')
		_province = work_space[0]
		if (work_space.length === 2){
			_city = work_space[1]
		}
		if (work_space.length === 3){
			_city = work_space[1]
			_area = work_space[2]
		}

		var _hospitals = [],_depart_ids = [],_service_type_ids = []
		$('#item-container2 .item').each(function(){
			_hospitals.push($(this).data('json'))
		})
		$('#item-container1 .item').each(function(){
			if ($(this).hasClass('item-chosen')){
				_depart_ids.push($(this).data('json'))
			}
		})
		$('#item-container3 .item').each(function(){
			if ($(this).hasClass('item-chosen')){
				_service_type_ids.push($(this).data('json'))
			}
		})


		var data = {
			real_name : name,
			sex : sex,
			email : email,
			province : _province,
			city : _city,
			area : _area,
			depart_ids : _depart_ids,
			service_type_ids : _service_type_ids,
			hospitals : _hospitals
		}

		$.ajax({
			url : '/agent/agent-sign',
			type : 'post',
			data : data,
			success : function(data){
				alert('data.message')
			}
		})
	})


});
