$(function(){
    var subtotal = 0;
    $('span.order_price').each(function(i,elem){
        subtotal += parseInt($(elem).text());
    });
    $('.subtotal').text('￥'+subtotal);
    $('.total_fee').text('￥'+subtotal);
});