<?= $this->Html->script('cart');?>

<div class="container cart_page">
    <div class="progress">
    	<div class="progress-bar" role="progressbar" style="width: 25%;">
    		ショッピングカート
    	</div>
    	<!-- <div class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;">
    		お届け先
    	</div>
    	<div class="progress-bar progress-bar-warning" role="progressbar" style="width: 25%;">
    		お支払いを確定
    	</div>
    	<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 25%;">
    		確定
    	</div> -->
    </div>
    <?php if(!empty($results)):?>
        <table class="table table-hover table-stripe cart_list">
            <thead>
                <tr>
                    <th>画像</th>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>数量</th>
                    <th>up/down</th>
                    <th>削除</th>
                    <th>商品単価</th>
                    <th>価格</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr class="current_cart">
                        <input type="hidden" name="item_id" value="<?=$result['Item']['id']?>">
                        <td><img src="<?=$result['Item']['picture_url']?>" class="img_thumb"></td>
                        <td><?=$result['Item']['item_name']?></td>
                        <td><?=$result['Item']['description']?></td>
                        <td class="item_num"><?=$result['Item']['item_num']?></td>
                        <td>
                            <a href="javascript:void(0)">▲</a><br>
                            <a href="javascript:void(0)">▼</a>
                        </td>
                        <td><a href="javascript:void(0)" id="delete_<?=$result['Item']['id']?>" data-id="<?=$result['Item']['id']?>" class="delete btn btn-danger">削除</a></td>
                        <td>￥<?=$result['Item']['price']?></td>
                        <td>￥<?=$result['Item']['price']*$result['Item']['item_num']?></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>小計</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>配送料</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>合計</strong></td>
                    <td></td>
                </tr>
            </tbody>

        </table>
        <a href="/order" class="btn btn-info">次へ</a>
    <?php else:?>
        <?=$this->Flash->render();?>
    <?php endif;?>
</div>