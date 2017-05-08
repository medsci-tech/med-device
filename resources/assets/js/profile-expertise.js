import $ from 'jquery'

$(function () {

	//初始化数据
	//获取科室
	var toDelete = []
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
				sweetAlert(data.message)
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
			// deleteItem({
			// 	id : data.id,
			// 	type : 'hospital'
			// })
			toDelete.push({
				id : data.id,
				type : 'hospital'
			})
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
		var is_repeat = false
		$('#item-container2 .inner').each(function(){
			if ($(this).text() === name){
				is_repeat = true
			}
		})
		return is_repeat
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
			var self = this
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
						id : self.index === 0 ? self.json[i].depart_id : self.json[i].service_type_id,
						type : self.index === 0 ? 'depart' : 'service'
					})
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

	//==================表单提交===========================
	$('#submit').click(function(){
		var list = []
		for (var i = 0; i < toDelete.length; i++) {
			list.push(deleteItem(toDelete[i]))
		}
		$.when(list).done(function(){

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
				depart_ids : JSON.stringify(_depart_ids.map(d => ({ depart_id: d.depart_id }))),
				service_type_ids : JSON.stringify(_service_type_ids.map(s => ({ service_type_id: s.service_type_id }))),
				hospitals : JSON.stringify(_hospitals.map(h => ({ city: h.city, hospital: h.hospital, province: h.province })))
			}
			console.log(data)
			$.ajax({
				url : '/personal/expertise',
				method : 'POST',
				data : data,
				success : function(data){
					sweetAlert(data.message)
				}
			})

		})

	})


	//获取个人专长数据
	var hospital_ids,department_ids,type_ids
	$.ajax({
		url : '/personal/get-hospital'
	}).then(function(data){
		for (var i = 0; i < data.length; i++) {
			container_appendHosItem(data[i])
		}
	})

	$.ajax({
		url : '/personal/get-depart'
	}).then(function(data){
		for (var i = 0; i < data.length; i++) {
			$('#item-container1 .item').each(function(){
				if ($(this).data('json').name === data[i].name){
					$(this).addClass('item-chosen')
				}
			})
			$('#panel1 .item').each(function(){
				if ($(this).children('span').text() === data[i].name){
					$(this).addClass('item-chosen')
				}
			})
		}
	})

	$.ajax({
		url : '/personal/get-service'
	}).then(function(data){
		for (var i = 0; i < data.length; i++) {
			$('#item-container3 .item').each(function(){
				if ($(this).data('json').name === data[i].name){
					$(this).addClass('item-chosen')
				}
			})
			$('#panel3 .item').each(function(){
				if ($(this).children('span').text() === data[i].name){
					$(this).addClass('item-chosen')
				}
			})
		}
	})

	function deleteItem(item){
		return $.ajax({
			url : '/personal/del-expertise',
			type : 'post',
			data : item
		}).done(function(data){
			console.log(data)
			if (data.status !== 1){
				sweetAlert(data.message)
			}
		})
	}


});