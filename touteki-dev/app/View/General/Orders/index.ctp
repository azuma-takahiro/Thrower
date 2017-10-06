<div class = "container">
    <div class="progress">
    	<div class="progress-bar" role="progressbar" style="width: 25%;">
    		ショッピングカート
    	</div>
    	<div class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;">
    		お届け先
    	</div>
    	<!-- <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 25%;">
    		お支払いを確定
    	</div>
    	<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 25%;">
    		確定
    	</div> -->
    </div>
    <?= $this->Form->create('Order',['url' => ['contrller' => 'Orders','action' => 'confirm']]) ;?>
    <input type="hidden" name="data[Order][customer_id]" value="<?=$auth_customer['id'];?>">

    <button type="button" name="flowData" class="btn btn-info">自宅に投擲ィ</button>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th class="active required">お名前</th>
                <td class="form-inline">
                    <?=$this->Form->input('dest_name', array('class' => 'form-control', 'div' => false, 'label' => false, 'type' => 'text', 'placeholder' => '名前'));?>
                </tr>
                <tr>
                    <th class="active required">クレジットカード番号</th>
                    <td>
                        <?=$this->Form->input('credit_number', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => false));?>
                    </td>
                </tr>
                <tr>
                    <th class="active required">住所</th>
                    <td>
                        <?=$this->Form->input('postal_code', array('class' => 'form-control', 'div' => false,'type' => 'text', 'placeholder' => '郵便番号', 'label' => false));?>
                        <?=$this->Form->input('prefecture', array('class' => 'form-control', 'div' => false, 'type' => 'select', 'options' => Configure::read('prefecture'), 'label' => '都道府県'));?>
                        <?=$this->Form->input('dest_address1', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => '市区町村・番地'));?>
                        <?=$this->Form->input('dest_address2', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => 'マンション名・ビル名'));?>
                    </td>
                </tr>
                <tr>
                    <th class="active required">電話番号</th>
                    <td>
                       <?=$this->Form->input('phone_number', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => '電話番号', 'placeholder' => '000-0000-0000'));?>

                   </td>
               </tr>
           </table>
       </div>
       <div style="margin-top: 10px; text-align: center;">
        <button type="button" onclick="history.back()" class="btn btn-default">戻る</a>
        <button type="submit" class="btn btn-primary">次へ</button>
    </div>
</div>