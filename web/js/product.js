function uploadImg() {

    if (!$('#imageFile').val()) {
        alert('请先选择需要上传的图片然后点此按钮');
        return;
    }

    //var formData = new FormData($('#bl-prod-form')); // not working
    //var formData = new FormData($('form')[1]); // works
    var formData = new FormData();
    formData.append('imageFile', $('input[type=file]')[0].files[0]);
    $('#bl-btn-upload').prop("disabled", true);
    $.ajax({
        url: ajaxUploadUrl,
        type: 'post',
        data: formData,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function (data) {
            var retData = JSON.parse(data);
            $('<img src="/' + mbase + retData.imgURI + '">').load(function () {
                $(this).width(150).height(150).appendTo('#bl-prod-img');
                $('#product-images').val(retData.imgURI);
            });
            $('#bl-btn-upload').prop("disabled", false);
        },
        error: function(data){
            console.log(data);
        }
    });
}

function deleteImg() {
    if (confirm('确定要删除已经上传的图片?')) {
        $('#bl-prod-img').empty();
        $('#product-images').val('');
    }

}

function increaseAmt(me) {
    var amtInput = $(me).siblings('input');
    amtInput.val(parseInt(amtInput.val()) + 1);
    var price = parseInt($($(me).parent().parent().siblings()[2]).html());
    $($(me).parent().parent().siblings()[3]).html(parseInt(amtInput.val()) * price);
}

function decreaseAmt(me) {
    //console.log(me);
    var amtInput = $(me).siblings('input');
    amtInput.val(parseInt(amtInput.val()) - 1);
    var price = parseInt($($(me).parent().parent().siblings()[2]).html());
    $($(me).parent().parent().siblings()[3]).html(parseInt(amtInput.val()) * price);

}

function ajaxProxy(params) {
    var retVal;
    $.ajax({
        url: proxyUrl,
        type: 'post',
        data: {'params': params},
        success: function (data) {
            //console.log(data);
            switch (params.xId) {
                case 1:
                    countCart(data);
                    break;
                case 2:
                    favMe(data, params);
                    break;
                case 3:
                    add2Cart(data);
                    break;
                default:
                    //console.log('switch default');
                    break;
            }
        }
    });

}

function countCart(data) {
    //ajaxProxy({'xId': 1, 'pId': pId});
    $('#bl-cart-badge').html(data);
}

function favMe(data, params) {
    //ajaxProxy({'xId': 2, 'pId': pId});
    if (data === '1') {
        $('#bl-num-fav-' + params.pId).html(parseInt($('#bl-num-fav-' + params.pId).html()) + 1);
    } else {
        $('#bl-btn-fav-' + params.pId).bind('click', function (e) {
            e.preventDefault();
        });
    }
}

function add2Cart(data) {
    $('#bl-cart-badge').html(data).animate({fontSize: 30}, 500).animate({fontSize: 12}, 500);
}

$(document).ready(function () {
    ajaxProxy({'xId': 1}); // countCart
});




