import $ from 'jquery'

$(function(){
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