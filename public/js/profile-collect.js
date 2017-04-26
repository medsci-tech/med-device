webpackJsonp([8],{

/***/ 16:
/***/ (function(module, exports, __webpack_require__) {

//"use strict";
$(document).ready(function(){
	$('.btn-cancel').click(function(){
        var _this=$(this);
        var product_id = $(_this).attr('product_id');
        swal({
            title: "您确定要删除吗？",
            text: "您确定要删除这条数据？",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            cancelButtonText: "取消操作",
            confirmButtonText: "是的，我要取消收藏",
            confirmButtonColor: "#ec6c62"
        }, function() {
            $.post('/product/collect', {product_id: product_id,action:0}, function(data) {
                if(data.status==1)
				{
                    swal("删除成功!", "", "success");
                    $(_this).parents('.collect-item').fadeOut();
				}
                    //location.reload();
                else
                    sweetAlert(data.message, "", "error");
            })
        });

	})

})

/***/ }),

/***/ 42:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 78:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(16);
module.exports = __webpack_require__(42);


/***/ })

},[78]);
//# sourceMappingURL=profile-collect.js.map