<div class="items form">
    <?php echo $this->Form->create('Item', ['url' => ['controller' => 'AdminItems','action' => 'save']]); ?>
        <?php if(!empty($this->request->data['Item']['id'])):?>
            <?=$this->Form->hidden('id');?>
        <?php endif;?>
        <?=$this->Form->input('item_name', array('class' => 'form-control'));?>
        <?=$this->Form->input('item_category', array('class' => 'form-control'));?>
        <?=$this->Form->input('maker_id', array('class' => 'form-control'));?>
        <?=$this->Form->input('description', array('class' => 'form-control'));?>
        <?=$this->Form->input('price', array('class' => 'form-control'));?>
        <?=$this->Form->input('picture_url', array('class' => 'form-control'));?>
        <?=$this->Form->input('created', array('class' => 'form-control'));?>
        <?=$this->Form->input('modified', array('class' => 'form-control'));?>
        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminItems/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>