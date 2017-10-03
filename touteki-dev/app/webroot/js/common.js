$(function() {
    // cookieにjsonを保存可能にする
    $.cookie.json = true;
    // 読み込み時のcookie内データ取り出し
    var currentItems = $.cookie('in_cart');
    // Item総数初期化
    var totalItemCount = 0;
    for (var item in currentItems) {
        totalItemCount += currentItems[item].item_num;
    }
    // １個以上の場合にカート横へ総数表示
    if (totalItemCount > 0) {
        $('#cart_item_num').text('('+totalItemCount+')');
        $('#cart_btn').attr('data-content','カートには'+totalItemCount+'個の商品が入っています');
    } else {
        $('#cart_btn').attr('data-content','カートの中身は空です');
    }
    $('#cart_btn').popover({
        trigger: 'hover',
        html: true,
    });
    // hidden formのvalueを入れる
    var json_items = JSON.stringify(currentItems)
    $("#my_cart1 [name=items]").val(json_items);
    $("#my_cart2 [name=items]").val(json_items);
})