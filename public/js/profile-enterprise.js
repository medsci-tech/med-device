webpackJsonp([4],{

/***/ 14:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {
	__WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-upload').each(function (i, upload) {
		var $up = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(upload);
		var id = $up.data('id');
		$up.uploadify({
			'debug': false,
			'method': 'post',
			'formData': {
				'file_id': id,
				'_token': $CSRFTOKEN
			},
			'onInit': function onInit(instance) {//初始化加载
				//$('#choose-icon-queue').hide();
			},
			'buttonText': '上传图像',
			'fileSizeLimit': '1MB',
			'fileTypeExts': '*.gif; *.jpg; *.png',
			'fileTypeDesc': '只能上传图片', //选择文件的时候的提示信息
			'swf': '/js/uploadify/uploadify.swf',
			'buttonImage': '', //重载按钮图片
			'buttonClass': '', //重载按钮样式
			'uploader': '/personal/enterprise',
			'width': 80,
			'onSelect': function onSelect(file) {
				if (file.size > 1024000) {
					//文件太大，取消上传该文件
					swal("文件大小超过限制！");
					$up.uploadify('cancel', file.id);
				}
			},
			onUploadProgress: function onUploadProgress() {
				console.log(arguments);
			},

			'onUploadSuccess': uploadFile,
			'onUploadError': function onUploadError(file, errorCode, errorMsg, errorString) {
				swal('文件 ' + file.name + ' 未能成功上传: ' + errorString);
			}
		});
		function uploadFile(file, data) {
			var data = __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.parseJSON(data);
			console.log(arguments);
			if (data.status === 1) {
				__WEBPACK_IMPORTED_MODULE_0_jquery___default()('#item_url_' + id).attr('src', data.data.url);
			} else {
				swal('上传失败!');
			}
		}
	});
});

/***/ }),

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ })

},[65]);