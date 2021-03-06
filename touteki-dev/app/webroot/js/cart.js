$(function(){
    $('a.delete').on("click",function(){
        $(this).parents('.current_cart').remove();
        setCookie();
    });

    var subtotal = 0;
    $('span.order_price').each(function(i,elem){
        subtotal += parseInt($(elem).text());
    });
    $('.subtotal').text('￥'+subtotal);
    $('.total_fee').text('￥'+subtotal);


    function setCookie() {
        var in_cart = {};
        $('tr.current_cart').each(function(i,elem) {
            var item_id = $(this).children('input[name=item_id]').val();
            var item_number = $(this).children('td.item_num').text();
            in_cart[item_id] = {
                'item_num': parseInt(item_number)
            };
        });
        // cookieに保存
        $.cookie('in_cart', in_cart,{ expires: 1 , path: '/' });
        var json_in_cart = JSON.stringify(in_cart);
        $("#my_cart1 [name=items]").val(json_in_cart);
    }
});