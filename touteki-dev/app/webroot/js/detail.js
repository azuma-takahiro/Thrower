$(function() {
    // cartに保存ボタンを押された時の動作
    $('.add_to_cart').click(function(){
        // 詳細ページからidを取得
        var item_id = $('.data_item_id').text();
        console.log(item_id);
        // cookieから情報を取得
        var in_cart = $.cookie('in_cart');
        // トータルアイテム個数に１追加
        totalItemCount++;
        // カートアイコン横へ表示
        $('#cart_item_num').text('('+totalItemCount+')');
        $('#cart_btn').attr('data-content','カートには'+totalItemCount+'個の商品が入っています');
        // cookieに値が入っているか判定
        if(in_cart == undefined) {
            // item_idをキー名にして個数を格納
            in_cart = {};
            in_cart[item_id] = {
                'item_num': 1
            };
        // cookieに値入っている
        } else {
            // すでにitem_idに一致するものが入っている
            if(item_id in in_cart) {
                // 個数を増やす
                in_cart[item_id].item_num ++;
            // item_idに一致するものはない
            } else {
                // item_idをキー名にして個数を格納
                in_cart[item_id] = {
                    'item_num': 1
                };
            }
        }
        // cookieに保存
        $.cookie('in_cart', in_cart,{ expires: 1 , path: '/' });
        var json_in_cart = JSON.stringify(in_cart);
        $("#my_cart1 [name=items]").val(json_in_cart);
        $("#my_cart2 [name=items]").val(json_in_cart);

        // モーダル表示
        getItemAjax(item_id).done(function(data) {
            $('.modal_item_pic').attr({'src':data.item.picture_url,'width':'30%'})
            $('.modal_item_name').text('商品名：'+data.item.item_name);
            $('.modal_item_price').text('金額：￥'+data.item.price);
        })
    })

    function getItemAjax(id) {
        return $.ajax({
            url:"/item/get_item_ajax",
            type:'POST',
            data:{id:id}
        });
    }
})