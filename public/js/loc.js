webpackJsonp([11],{

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(6);


/***/ }),

/***/ 6:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {
    var inputTimer = null;
    var inputEvent = function inputEvent(e) {
        var input = e.target;
        clearTimeout(inputTimer);
        inputTimer = setTimeout(function () {
            console.log(input.value);
        }, 300);
    };
    var wrapper = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('#loc-wrapper').css('position', 'relative').click(function () {
        locSelector.toggle();
    });
    var output = wrapper.find('#area');

    var locSelector = __WEBPACK_IMPORTED_MODULE_0_jquery___default()('<div style="position:absolute;display:none;">\
	<div class="content" style="height:auto;float:none;">\
	<div class="_l1" style="float: none"></div><div class="_l2" style="float: none"></div><div class="_l3" style="float: none"></div></div>');
    locSelector.css({
        position: 'absolute',
        display: 'none',
        top: '50px',
        padding: '10px',
        left: '-101px',
        background: '#fff',
        border: '1px solid #d7d7d7',
        borderTop: '0 none',
        width: '420px',
        height: 'auto',
        lineHeight: '1.4',
        zIndex: '99999'
    });
    locSelector.on('click', function (e) {
        e.stopPropagation();
    });
    var content = locSelector.find('.content');
    var l1 = content.find('._l1'),
        l2 = content.find('._l2'),
        l3 = content.find('._l3');

    var $data, $prov, $city, $area;

    l1.on('click', function (e) {
        var $tar = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(e.target);
        var id = $tar.attr('data-loc-id');
        if (id) {
            if ($prov) {
                l1.find('.btn').removeClass('hide');
                l2.html('');
                l3.html('');
                $prov = $city = $area = void 0;
            } else {
                l1.find('.btn').addClass('hide');
                $tar.removeClass('hide');
                $data.some(function (prov) {
                    if (prov.id === id) {
                        $prov = prov;
                        return true;
                    }
                });
                if ($prov.cities) {
                    l2.html($prov.cities.map(function (city) {
                        return '<a class="btn btn-sm btn-default" data-loc-id="' + city.id + '" data-loc-name="' + city.name + '" style="line-height:1.5;height:auto;margin: 2px">' + city.name + '</a>';
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
                l2.find('.btn').removeClass('hide');
                l3.html('');
                $city = $area = void 0;
            } else {
                l2.find('.btn').addClass('hide');
                $tar.removeClass('hide');
                $prov.cities.some(function (city) {
                    if (city.id === id) {
                        $city = city;
                        return true;
                    }
                });
                if ($city.areas) {
                    l3.html($city.areas.map(function (area) {
                        return '<a class="btn btn-sm btn-default" data-loc-id="' + area.id + '" data-loc-name="' + area.name + '" style="line-height:1.5;height:auto;margin: 2px">' + area.name + '</a>';
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
        output.val([$prov.name, $city.name, $tar.attr('data-loc-name')].join(' - '));
        reset();
    });
    locSelector.appendTo(wrapper);

    fetchData().then(render);

    function reset() {
        locSelector.hide();
    }

    function render(data) {
        $data = data;
        l1.html(data.map(function (prov) {
            return '<a class="btn btn-sm btn-default" data-loc-id="' + prov.id + '" data-loc-name="' + prov.name + '" style="line-height:1.5;height:auto;margin: 2px">' + prov.name + '</a>';
        }).join(''));
    }

    function fetchData() {
        return __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.getJSON('/json/loc.json');
    }
});

/***/ })

},[56]);