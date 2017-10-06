<div id="itemlist" class="container">
    <div class="ProductList">
        <h2>Items</h2>
        <ul class="ProductWrap">
            <div class="row">
                <?php if(count($items)) :?>
                    <div class="col-md-12">
                        <?php for($listcol = 0; $listcol < 6; $listcol++ ) :?>
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="/items/detail/<?= $items[$listcol]['id'];?>"><img src="<?=  $items[$listcol]['picture_url'] ? $items[$listcol]['picture_url'] : '/img/other/noimage.jpeg' ;?>">
                                        <div class="caption">
                                            <h3><?=  $items[$listcol]['item_name'] ;?></h3>
                                            <p><?=  $items[$listcol]['description'] ;?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endfor ;?>
                    </div>
                <?php else :?>
                    <div class="alert alert-info" role="alert">商品が存在しません。</div>
                <?php endif ;?>
            </div>
        </div><!-- /ProductList -->
        <h2>Related Product</h2>
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
        <div class="Rank">
            <h2>RANKING</h2>
            <div class="col-md-12">
                <?php for($rankls = 1; $rankls <= 3; $rankls++ ) :?>
                    <div class="col-xs-6 col-md-4">
                        <div class="thumbnail">
                            <a href="/items/detail/<?= $items[$rankls]['id'] ;?>"><img src="<?=  $items[$rankls]['picture_url'] ;?>">
                                <div class="caption">
                                    <h3><?=  $items[$rankls]['item_name'] ;?></h3>
                                    <p><?=  $items[$rankls]['description'] ;?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endfor ;?>
            </div>
        </div><!-- /rank -->
    </div><!-- /main -->
</div>