<div class="users form">
    <?php echo $this->Form->create('Order', ['url' => ['controller' => 'AdminOrders','action' => 'save']]); ?>
        <?php if(!empty($this->request->data['Order']['id'])):?>
            <?=$this->Form->hidden('id');?>
        <?php endif;?>
        <?=$this->Form->input('dest_address1', array('class' => 'form-control','type' => 'text', 'label' => '住所'));?>
        <?=$this->Form->input('dest_address2', array('class' => 'form-control','type' => 'text', 'label' => '建物名'));?>
        <?=$this->Form->input('dest_phone_number', array('class' => 'form-control','type' => 'text', 'label' => '電話番号'));?>
        <?=$this->Form->input('credit_number', array('class' => 'form-control','type' => 'text', 'label' => 'クレジットカード番号'));?>

        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminOrders/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>