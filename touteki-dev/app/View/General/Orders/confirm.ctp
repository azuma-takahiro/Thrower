<?= $this->Html->script('confirm');?>

<div class="container">
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;">
            ショッピングカート
        </div>
        <div class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;">
            お届け先
        </div>
        <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 25%;">
            お支払いを確定
        </div>
        <!-- <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 25%;">
            確定
        </div> -->
    </div>
    <div class="dest_area">
        <table class="table table-bordered dest_area">
            <tr>
                <th class="active">お届け先お名前</th>
                <td class="form-inline"><?=$this->request->data['Order']['dest_name'];?></td>
            </tr>
            <tr>
                <th class="active">クレジットカード番号</th>
                <td class="form-inline"><strong><?=$this->request->data['Order']['credit_number'];?></strong></td>
            </tr>
            <tr>
                <th class="active">お届け先ご住所</th>
                <td class="form-inline">〒<?=$this->request->data['Order']['postal_code'];?><br>
                <?=$this->request->data['Order']['prefecture'];?><br>
                <?=$this->request->data['Order']['dest_address1'];?><br>
                <?=$this->request->data['Order']['dest_address2'];?></td>
            </tr>
            <tr>
                <th class="active">お届け先お電話番号</th>
                <td><?=$this->request->data['Order']['phone_number'];?></td>
            </tr>
        </table>
    </div>
    <div class="item_area">
        <table class="table table-bordered item_area">
            <?php if(!empty($this->request->data['item'])):?>
                <thead>
                    <tr>
                        <th>画像</th>
                        <th>商品名</th>
                        <th>商品説明</th>
                        <th>数量</th>
                        <th>商品単価</th>
                        <th>価格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->request->data['item'] as $result): ?>
                        <tr class="current_cart">
                            <input type="hidden" name="item_id" value="<?=$result['Item']['id']?>">
                            <td><img src="<?=$result['Item']['picture_url']?>" class="img_thumb"></td>
                            <td><?=$result['Item']['item_name']?></td>
                            <td><?=$result['Item']['description']?></td>
                            <td class="item_num"><?=$result['item_num']?></td>
                            <td>￥<?=$result['Item']['price']?></td>
                            <td class="">￥<span class="order_price"><?=$result['Item']['price']*$result['item_num']?></span></td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                        <td colspan="4"></td>
                        <td>小計</td>
                        <td class="subtotal">0</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>配送料</td>
                        <td class="deli_charge">0</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td><strong>合計</strong></td>
                        <td class="total_fee">0</td>
                    </tr>
                </tbody>
            <?php endif;?>
        </table>
        <?= $this->Form->create('Order',['url' => ['controller' => 'Orders','action' => 'save']]) ;?>
            <input type="hidden" name="data[Order][customer_id]" value="<?=$auth_customer['id']?>">
            <input type="hidden" name="data[Order][dest_name]" value="<?=$this->request->data['Order']['dest_name']?>">
            <input type="hidden" name="data[Order][dest_postal_code]" value="<?=$this->request->data['Order']['postal_code']?>">
            <input type="hidden" name="data[Order][dest_prefecture]" value="<?=$this->request->data['Order']['prefecture']?>">
            <input type="hidden" name="data[Order][dest_address1]" value="<?=$this->request->data['Order']['dest_address1']?>">
            <input type="hidden" name="data[Order][dest_address2]" value="<?=$this->request->data['Order']['dest_address2']?>">
            <input type="hidden" name="data[Order][dest_phone_number]" value="<?=$this->request->data['Order']['phone_number']?>">
            <button type="submit" class="btn btn-primary">注文を確定する</button>
        <?= $this->Form->end();?>
    </div>
</div>