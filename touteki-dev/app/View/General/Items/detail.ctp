<div class="container">

    <ol class="breadcrumb">
        <li><a href="http://touteki-dev.tk/Items/top"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Top　
         </a></li>
        <li class="active"> 商品詳細 </li>
    </ol>

    <div class="container bg-success">
        <ul class="container">
            <!-- <li class="mb-none col-md-2"><img src='/img/other/large_arrow_left.png'></li> -->
            <li class="col-xs-12 col-md-12"><img src="<?=$item['Item']['picture_url'];?>" alt="商品画像" class="img-responsive item_picture"></li>
            <!-- <li class="mb-none col-md-2"><img src='/img/other/large_arrow_right.png'></li> -->
        </ul>
        <div class="container">
            <span class="data_item_id" style="display:none"><?= $item['Item']['id'];?></span>
            <b>商品名</b>：<span class="data_item_name"><?= $item['Item']['item_name'];?>
            <br><b>説明</b>：<?= $item['Item']['description'];?>
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
</div><!-- .container -->

