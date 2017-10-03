<?= $this->Html->script('detail');?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="http://touteki-dev.tk/Items/top"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Top　
         </a></li>
        <li class="active"> 商品詳細 </li>
    </ol>

    <div class="container item_contents">
        <img src="<?=$item['Item']['picture_url'];?>" alt="商品画像" class="img-responsive item_picture">
        <div class="container">
            <dl>
                <dd><span class="data_item_id" style="display:none"><?= $item['Item']['id'];?></span></dd>
                <dd><b>カテゴリー</b>：<?= Configure::read('item_category')[$item['Item']['item_category']];?></dd>
                <dd><b>商品名</b>：<span class="data_item_name"><?= $item['Item']['item_name'];?></dd>
                <dd><b>説明</b>：<?= $item['Item']['description'];?></dd>
                <dd><b>金額</b>：￥<span class="data_item_price"><?= $item['Item']['price'];?></span></dd>
                <dd>
                    <button class="btn btn-info btn-sm add_to_cart" data-toggle="modal" data-target="#myModal">カートに追加
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </dd>
            </dl>
        </div>
    </div><!-- ProductDetail -->

    <div class="container bg-warning">
        <h3><p>USER'S COMMENT</p></h3>
        <?php if(empty($item['Comment'])):?>
            まだコメントはありません
        <?php else :?>
            <?php foreach($item['Comment'] as $comment): ?>
                <div class="comment"><?=$comment['comment'];?>
            <?php endforeach;?>
        <?php endif;?>
    </div><!-- Review -->

    <div class="container bg-info">
        <h2><p class="headline">RELATED PRODUCT</p></h2>
        <ul class="container">
            <li class="mb-none col-md-1"><img src='/img/other/large_arrow_left.png'></li>
            <li class="col-xs-12 col-md-2"><img src='/img/item/discus_2.jpg'></li>
            <li class="col-xs-12 col-md-2"><img src='/img/item/discus_3.jpg'></li>
            <li class="col-xs-12 col-md-2"><img src='/img/item/discus_4.jpg'></li>
            <li class="col-xs-12 col-md-2"><img src='/img/item/discus_5.jpg'></li>
            <li class="mb-none col-md-1"><img src='/img/other/large_arrow_right.png'></li>
        </ul>
    </div><!-- .container bg-info -->

    <!-- カートの中身と合計 -->
    <div id="myModal" class="modal fade container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="panel">
                <div class="panel-body panel-info">
                    <h3 class="text-center">カートに商品が追加されました</h3>
                </div>
            </div>

            <div class="items" style="width:300px;margin-left:auto;margin-right:auto;">
                <img class="modal_item_pic">
                <div class="modal_item_name"></div>
                <div class="modal_item_price"></div>
            </div>

            <div id="close_cart">
                <button class="btn btn-default btn-s pull-left" data-dismiss="modal">買い物を続ける</button>
            </div>

            <div id="go_cart">
                <form id="my_cart2" method="post" name="my_cart2" action="/items/cart">
                    <input type="hidden" name="items" value="">
                    <a href="javascript:my_cart2.submit()" class="btn btn-warning btn-s">購入へ <span class="glyphicon glyphicon-chevron-right"></span></a>
                </form>
            </div>
        </div>
    </div>
</div><!-- .container -->

