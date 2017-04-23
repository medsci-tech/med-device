webpackJsonp([6],{

/***/ 18:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

$(document).ready(function () {

	//初始化数据
	var data, originData, province = [], cities = [], hospitals = []
	$.post({
		url: '/get-hospital',
		success : function(data){
			originData = {
  "code": 200,
  "status": 1,
  "message": "医院列表",
  "data": [
    {
      "id": 11069,
      "province": "湖北",
      "city": "武汉",
      "area": "蔡甸",
      "hospital": "武汉市蔡甸妇幼保健"
    },
    {
      "id": 11072,
      "province": "湖南",
      "city": "武汉",
      "area": "东西湖",
      "hospital": "武汉兰青肿瘤医院"
    },
    {
      "id": 11073,
      "province": "河北",
      "city": "武汉",
      "area": "东西湖",
      "hospital": "武汉明仁中医医院"
    },
    {
      "id": 11088,
      "province": "湖北",
      "city": "宜昌",
      "area": "汉阳",
      "hospital": "武汉华西医院"
    }
  ]
}
		}
	}).then(function(asd){
		console.log(asd)
		data = originData.data
		for (var i = 0; i < data.length; i++) {
			if (!isRepeat(province, data[i].province)){
				province.push(data[i].province)
			}
		}
		for (var i = 0; i < province.length; i++) {
			$('<div>' + province[i] + '</div>').addClass('item').click(function(){
				var provName = $(this).text()
				$('.province span').text(provName)
				$('.city span').text("")
				filterCity(provName)
				filterHospital(provName)
				refreshCityBox()
				refreshHospitalBox()
			}).appendTo($('.province .drop-item'))
		}
	})
	function filterCity(province){
		cities = []
		for (var i = 0; i < data.length; i++) {
			if (data[i].province === province && !isRepeat(cities, data[i].city)){
				cities.push(data[i].city)
			}
		}
	}
	function filterHospital(province, city){
		hospitals = []
		if (city){
			for (var i = 0; i < data.length; i++) {
				var dataItem = data[i]
				if (dataItem.province === province && dataItem.city === city && !isRepeat(hospitals, dataItem.hospital)){
					hospitals.push(dataItem.hospital)
				}
			}
		} else{
			for (var i = 0; i < data.length; i++) {
				var dataItem = data[i]
				if (dataItem.province === province && !isRepeat(hospitals, dataItem.hospital)){
					hospitals.push(dataItem.hospital)
				}
			}
		}
		
	}
	function isRepeat(arr, ele){
		for (var i = 0; i < arr.length; i++) {
			if (arr[i] === ele){
				return true
			}
		}
		return false
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

	function refreshHospitalBox(){
		var container = $('#panel2 .items')
		container.empty()
		for (var i = 0; i < hospitals.length; i++){
			var item_hos = $('<div class="item"><span class="name">' + hospitals[i] + '</span></div>')
			var checkbox = $('<input type="checkbox">').appendTo(item_hos)
			item_hos.click(function(){
				checkbox.click()
			})
			checkbox.click(function(){
				$(this).click()
			})
			item_hos.appendTo(container)
		}
	}

	function refreshCityBox(){
		var container = $('.city .drop-item')
		container.empty()
		for (var i = 0; i < cities.length; i++) {
			$('<div>' + cities[i] + '</div>').addClass('item').click(function(){
				var cityName = $(this).text()
				$('.city span').text(cityName)
				filterHospital($('.province span').text(), cityName)
				refreshHospitalBox()
			}).appendTo(container)
		}
	}

	//选择覆盖区域
	var container_appendHosItem = function(title){
		var cancelBtn = $('<span class="icon"><span class="icon2"></span></span>')
		var item = $('<div class="item" style="display:block"><span class="inner">' + title + '</span></div>').append(cancelBtn).appendTo($('#item-container2'))
		cancelBtn.click(function(){
			item.remove()
		})
	}
	$('#panel2 .btn-panel').click(function(){
		$('#item-container2').empty()

		var $items = $('.items .item');
		for (var i = 0; i < $items.length; i++) {
			if ($items.eq(i).children('input')[0].checked){
				container_appendHosItem($items.eq(i).children('.name').text())
			}
		}
	})
	$('#hospital').click(function () {
		$('#panel2').fadeIn();
		$('.shielder').show();
	});







	function manager(data, index) {
		this.data = data;
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
			var item2 = $('<div class="item"><span class="inner">' + this.data[i] + '</span></div>').append(cancelBtn).appendTo(this.container);
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

	var manager1 = new manager(['科室一', '科室二还是发卡机舒服还是', '科室三'], 0);
	var manager3 = new manager(['科室一', '科室二', '科室'], 2);
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),

/***/ 44:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 80:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(18);
module.exports = __webpack_require__(44);


/***/ })

},[80]);
//# sourceMappingURL=profile-expertise.js.map