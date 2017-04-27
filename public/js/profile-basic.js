webpackJsonp([6],{

/***/ 11:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {

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

	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#choose-icon').uploadify({
		'debug': false,
		'method': 'post',
		'formData': {
			'_token': '{{ csrf_token() }}'
		},
		'onInit': function onInit(instance) {//初始化加载
			//$('#choose-icon-queue').hide();
		},
		'buttonText': '上传图像',
		'fileSizeLimit': '2MB',
		'fileTypeExts': '*.gif; *.jpg; *.png',
		'fileTypeDesc': '只能上传图片', //选择文件的时候的提示信息
		'swf': "/js/uploadify/uploadify.swf",
		'buttonImage': '', //重载按钮图片
		'buttonClass': '', //重载按钮样式
		'uploader': "/personal/upload-head",
		'width': 80,
		'onSelect': function onSelect(file) {
			if (file.size > 1024000 * 2) {
				//文件太大，取消上传该文件
				sweetAlert("文件大小超过限制！");
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#choose-icon').uploadify('cancel', file.id);
			}
		},
		'onUploadSuccess': uploadFile,
		'onUploadError': function onUploadError(file, errorCode, errorMsg, errorString) {
			sweetAlert('The file ' + file.name + ' could not be uploaded: ' + errorString);
		}
		//            'onUploadSuccess' : function(file, data, response) {
		//                sweetAlert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
		//            }
	});
	function uploadFile(file, data) {
		var data = __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.parseJSON(data);
		if (data.status == 1) {
			__WEBPACK_IMPORTED_MODULE_0_jquery___default()('img[name=head]').attr('src', data.data.head_img);
		} else {
			sweetAlert('上传失败!');
		}
	}
});

/***/ }),

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ })

},[61]);