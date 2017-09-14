<div class="users form">
    <?php echo $this->Form->create('OrderDetail', ['url' => ['controller' => 'AdminOrderDetails','action' => 'save']]); ?>
        <?php if(!empty($this->request->data['OrderDetail']['id'])):?>
            <?=$this->Form->hidden('id');?>
        <?php endif;?>
        <?=$this->Form->input('item_id', array('class' => 'form-control','type' => 'text', 'label' => '商品ID'));?>
        <?=$this->Form->input('quantity', array('class' => 'form-control', 'label' => '個数'));?>
        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminOrderDetails/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>