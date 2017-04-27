webpackJsonp([0],[
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__loc__ = __webpack_require__(6);

window.$ = window.jQuery = __WEBPACK_IMPORTED_MODULE_0_jquery___default.a;


__WEBPACK_IMPORTED_MODULE_0_jquery___default()('form[name="searchForm"]').on('submit', function (e) {
	if (this.keyword.value.trim()) {
		this.keyword.value = this.keyword.value.trim();
	} else {
		sweetAlert("请输入搜索关键词!");
		e.preventDefault();
	}
});

__WEBPACK_IMPORTED_MODULE_0_jquery___default()('input[data-type="area"]').locationSelector({
	a: 123
});

/***/ }),
/* 4 */,
/* 5 */,
/* 6 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);
/* harmony export (immutable) */ __webpack_exports__["default"] = locationSelector;


var $data = void 0;

function fetchData() {
	return __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.getJSON('/json/loc.json').then(function (data) {
		$data = data;

		return $data;
	});
}
fetchData();

__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.fn.locationSelector = locationSelector;

function _selector(input, config) {
	var $input = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(input),
	    $id = '_modal_' + Date.now().toString(36),
	    $init = false;

	var $modal = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div class="modal fade" id="' + $id + '" tabindex="-1" role="dialog">\n\t\t<div class="modal-dialog">\n\t\t\t<style>\n\t\t\t.loc-selector .btn{\n\t\t\t\tmargin: 2px\n\t\t\t}\n\t\t\t</style>\n\t\t\t<div class="modal-content">\n\t\t\t\t<div class="modal-body loc-selector">\n\t\t\t\t\t<div class="_l1"></div>\n\t\t\t\t\t<div class="_l2"></div>\n\t\t\t\t\t<div class="_l3"></div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>');
	$modal.appendTo('body');
	var inputTimer = null;
	var inputEvent = function inputEvent(e) {
		var input = e.target;
		clearTimeout(inputTimer);
		inputTimer = setTimeout(function () {
			console.log(input.value);
		}, 300);
	};
	$input.on('click', function (e) {
		if (!$init) {
			if (!$data) {
				fetchData().then(render).then(function (x) {
					return $init = true;
				});
			} else {
				render($data);
				$init = true;
			}
		}
		$modal.modal();
	});

	var l1 = $modal.find('._l1'),
	    l2 = $modal.find('._l2'),
	    l3 = $modal.find('._l3');

	var $prov = void 0,
	    $city = void 0,
	    $area = void 0;

	l1.on('click', function (e) {
		var $tar = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target);
		var id = $tar.attr('data-loc-id');
		if (id) {
			if ($prov) {
				$tar.removeClass('active');
				l1.find('.btn').removeClass('hide');
				l2.html('');
				l3.html('');
				$prov = $city = $area = void 0;
			} else {
				l1.find('.btn').addClass('hide');
				$tar.removeClass('hide').addClass('active');
				$data.some(function (prov) {
					if (prov.id === id) {
						$prov = prov;
						return true;
					}
				});
				if ($prov.cities) {
					l2.html($prov.cities.map(function (city) {
						return '<a class="btn btn-sm btn-default" data-loc-id="' + city.id + '" data-loc-name="' + city.name + '">' + city.name + '</a>';
					}));
					if ($prov.cities.length === 1) {
						l2.find('.btn').click();
					}
				} else {
					output.val($prov.name);
					reset();
				}
			}
		}
	});
	l2.on('click', function (e) {
		var $tar = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target);
		var id = $tar.attr('data-loc-id');
		if (id) {
			if ($city) {
				$tar.removeClass('active');
				l2.find('.btn').removeClass('hide');
				l3.html('');
				$city = $area = void 0;
			} else {
				l2.find('.btn').addClass('hide');
				$tar.removeClass('hide').addClass('active');
				$prov.cities.some(function (city) {
					if (city.id === id) {
						$city = city;
						return true;
					}
				});
				if ($city.areas) {
					l3.html($city.areas.map(function (area) {
						return '<a class="btn btn-sm btn-default" data-loc-id="' + area.id + '" data-loc-name="' + area.name + '">' + area.name + '</a>';
					}));
				} else {
					output.val([$prov.name, $city.name].join(' - '));
					reset();
				}
			}
		}
	});
	l3.on('click', function (e) {
		var $tar = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target);
		l3.find('.btn').removeClass('active');
		$tar.addClass('active');
		$input.val([$prov.name, $city.name, $tar.attr('data-loc-name')].join(' - '));
		reset();
	});

	function reset() {
		$modal.modal('hide');
	}

	function render(data) {
		l1.html(data.map(function (prov) {
			return '<a class="btn btn-sm btn-default" data-loc-id="' + prov.id + '" data-loc-name="' + prov.name + '">' + prov.name + '</a>';
		}).join(''));
	}
}
function locationSelector(config) {
	this.attr('readonly', 'readonly').each(function (i, input) {
		_selector(input, config);
	});
	return this;
}

/***/ }),
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */,
/* 13 */,
/* 14 */,
/* 15 */,
/* 16 */,
/* 17 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 18 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 19 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 20 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 21 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 22 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 23 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 24 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 25 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 26 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 27 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 28 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 29 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 30 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 31 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 32 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 33 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 34 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 35 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 36 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 37 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 38 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 39 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 40 */,
/* 41 */,
/* 42 */,
/* 43 */,
/* 44 */,
/* 45 */,
/* 46 */,
/* 47 */,
/* 48 */,
/* 49 */,
/* 50 */,
/* 51 */,
/* 52 */,
/* 53 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(3);
__webpack_require__(38);
__webpack_require__(39);
__webpack_require__(17);
__webpack_require__(18);
__webpack_require__(19);
__webpack_require__(20);
__webpack_require__(21);
__webpack_require__(22);
__webpack_require__(23);
__webpack_require__(24);
__webpack_require__(25);
__webpack_require__(26);
__webpack_require__(27);
__webpack_require__(28);
__webpack_require__(29);
__webpack_require__(30);
__webpack_require__(31);
__webpack_require__(32);
__webpack_require__(33);
__webpack_require__(34);
__webpack_require__(35);
__webpack_require__(36);
module.exports = __webpack_require__(37);


/***/ })
],[53]);