<div class = "inquiries form">
    <?= $this->Form->create('Inquiry',['url' => ['controller' => 'AdminInquiries','action' => 'edit']]); ?>
    <?= $this->Form->input('customer_id',array(
        'label' => '顧客ID',
        'class' => 'form-control',
        'type' => 'text')); ?>
    <?= $this->Form->input('inquiry_category',array(
        'label' => 'お問い合わせ種類',
        'options' => $inquiry_category,
        'class' => 'form-control')); ?>
    <?= $this->Form->input('content',array(
        'label' => '内容',
        'class' => 'form-control')); ?>
    <?= $this->Form->hidden('id'); ?>
        <div style="margin-top: 10px; text-align: center;">
        <a href="/AdminInquiries/" class="btn btn-default">戻る</a>
        <button type="submit" class="btn btn-primary">更新</button>
        </div>
    <?= $this->Form->end(); ?>
</div>