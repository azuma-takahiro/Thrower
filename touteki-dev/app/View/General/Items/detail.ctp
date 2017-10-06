<?= $this->Html->script('detail');?>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="http://touteki-dev.tk/Items/top"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Top　
        </a></li>
        <li class="active"> 商品詳細 </li>
    </ol>

    <div class="item_contents">
        <img src="<?=$item['Item']['picture_url'];?>" alt="商品画像" class="img-responsive item_picture">
        <div>
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

    <div class="comments">
        <h3><p>USER'S COMMENT</p></h3>
        <?php if(empty($item['Comment'])):?>
            まだコメントはありません
        <?php else :?>
            <?php foreach($item['Comment'] as $comment): ?>
                <div class="comment"><?=$comment['comment'];?>
                <?php endforeach;?>
            <?php endif;?>
        </div><!-- Review -->
        <div id="sampleCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#sampleCarousel" data-slide-to="0"></li>
                <li data-target="#sampleCarousel" data-slide-to="1"></li>
                <li data-target="#sampleCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php for($related = 0; $related <= 3; $related++):?>
                        <div class="col-xs-6 col-md-3">
                            <div class="thumbnail">
                                <a href="/items/detail/<?= $items[$related]['id'] ;?>"><img src="<?=  $items[$related]['picture_url'] ;?>">
                                    <div class="caption">
                                        <h3><?=  $items[$related]['item_name'] ;?></h3>
                                        <p><?=  $items[$related]['description'] ;?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endfor ;?>
                </div>
                <div class="item">
                    <?php for($related = 4; $related <= 5; $related++):?>
                        <div class="col-xs-6 col-md-3">
                            <div class="thumbnail">
                                <a href="/items/detail/<?= $items[$related]['id'] ;?>"><img src="<?=  $items[$related]['picture_url'] ;?>">
                                    <div class="caption">
                                        <h3><?=  $items[$related]['item_name'] ;?></h3>
                                        <p><?=  $items[$related]['description'] ;?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endfor ;?>
                </div>
            </div>
            <a class="left carousel-control" href="#sampleCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">前へ</span>
            </a>
            <a class="right carousel-control" href="#sampleCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">次へ</span>
            </a>
        </div>
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

