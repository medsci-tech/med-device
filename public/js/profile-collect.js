webpackJsonp([5],{

/***/ 13:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


// $(function(){
// 	$('.btn-cancel').click(function(){
//         var _this=$(this);
//         var product_id = $(_this).attr('product_id');
//         swal({
//             title: "您确定要删除吗？",
//             text: "您确定要删除这条数据？",
//             type: "warning",
//             showCancelButton: true,
//             closeOnConfirm: false,
//             cancelButtonText: "取消操作",
//             confirmButtonText: "是的，我要取消收藏",
//             confirmButtonColor: "#ec6c62"
//         }, function() {
//             $.post('/product/collect', {product_id: product_id,action:0}, function(data) {
//                 if(data.status==1)
// 				{
//                     swal("删除成功!", "", "success");
//                     $(_this).parents('.collect-item').fadeOut();
// 				}
//                     //location.reload();
//                 else
//                     sweetAlert(data.message, "", "error");
//             })
//         });

// 	})

// })

__WEBPACK_IMPORTED_MODULE_0_jquery___default()(function () {
    __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.btn-cancel').click(function () {
        var _this = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this);
        var product_id = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(_this).attr('product_id');
        __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.post('/product/collect', { product_id: product_id, action: 0 }, function (data) {
            if (data.status == 1) {
                __WEBPACK_IMPORTED_MODULE_0_jquery___default()(_this).parents('.collect-item').fadeOut();
            }
            //location.reload();
            else sweetAlert(data.message, "", "error");
        });
    });
});

/***/ }),

/***/ 64:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(13);


/***/ })

},[64]);