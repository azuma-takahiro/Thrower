<div class="users form">
    <?php echo $this->Form->create('Comment', ['url' => ['controller' => 'AdminComments','action' => 'save']]); ?>
        <?php if(!empty($this->request->data['Comment']['id'])):?>
            <?=$this->Form->hidden('id');?>
        <?php endif;?>
        <?=$this->Form->input('customer_id', array('class' => 'form-control','type' => 'text'));?>
        <?=$this->Form->input('item_id', array('class' => 'form-control', 'type' => 'text'));?>
        <?=$this->Form->input('comment', array('class' => 'form-control'));?>

        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminComments/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>