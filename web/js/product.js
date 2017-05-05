function uploadImg() {
    
    if(! $('#imageFile').val()){
        alert('Select a file to upload.');
        return;
    }
    
    var formData = new FormData($('form')[0]);
    $('#bl-btn-upload').prop("disabled", true);
    $.ajax({
        url: ajaxUploadUrl,
        type: 'post',
        data: formData,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function (data) {
            var retData = JSON.parse(data);
            $('<img src="' + mbase + retData.imgURI + '">').load(function () {
                $(this).width(150).height(150).appendTo('#bl-prod-img');
                $('#product-images').val(retData.imgURI);
            });
            $('#bl-btn-upload').prop("disabled", false);
        }
    });
}

function deleteImg() {
    if (confirm('Delete?')) {
        $('#bl-prod-img').empty();
        $('#product-images').val('');
    }

}


$(document).ready(function () {
    console.log('ready');
    $('.product-index table tbody tr td:nth-child(2)').each(function () {
        var imgName = $(this).html().slice(0, -1);
        $(this).html('<img width=100 height=100 src="./mstore/' + imgName + '">');
    });

    $('.product-view table tbody tr:nth-child(4) td:nth-child(2)').html(function () {
        var imgName = $(this).html().slice(0, -1);
        $(this).html('<img width=100 height=100 src="./mstore/' + imgName + '">');
    });


    // Load existing production images
    var prodImg = $('#product-images').val();
    //console.log(prodImg);
    if (prodImg) {
        var images = prodImg.split(";");
        for (var i = 0; i < images.length - 1; i++) {
            $('<img src="' + mbase + images[i] + '">').load(function () {
                $(this).width(150).height(150).appendTo('#bl-prod-img');
            });
        }
    }


});

