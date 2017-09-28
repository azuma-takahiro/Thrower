<div class="items form">
    <?php echo $this->Form->create('Item', ['url' => ['controller' => 'AdminItems','action' => 'save'], 'enctype' => 'multipart/form-data']); ?>
        <?php if(!empty($this->request->data['Item']['id'])):?>
            <?=$this->Form->hidden('id');?>
        <?php endif;?>
        <?=$this->Form->input('item_name', array('label' => '商品名', 'class' => 'form-control'));?>
        <?=$this->Form->input('item_category', ['options' => $item_category, 'label' => '商品カテゴリー','class' => 'form-control']);?>
        <?=$this->Form->input('maker_id', array('label'=> 'メーカーID','class' => 'form-control'));?>
        <?=$this->Form->input('description', array('label' => '説明文', 'class' => 'form-control'));?>
        <?=$this->Form->input('price', array('label' => '価格', 'class' => 'form-control'));?>
        <?=$this->form->input('Item.img_name', array('type'=>'file', 'label'=>'商品画像'));?>

        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminItems/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>