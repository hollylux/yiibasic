$(document).ready(function () {
    console.log('ready');
    $('.product-index table tbody tr td:nth-child(2)').each(function () {
        var imgName = $(this).html().slice(0,-1);
        $(this).html('<img width=100 height=100 src="./mstore/' + imgName + '">');
    });
    
    $('.product-view table tbody tr:nth-child(4) td:nth-child(2)').html(function () {
        var imgName = $(this).html().slice(0,-1);
        $(this).html('<img width=100 height=100 src="./mstore/' + imgName + '">');
    });
    
});