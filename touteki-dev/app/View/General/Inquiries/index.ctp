<div class = "仮">
    <?= $this->Form->create('Inquiry',['url' => 'Inquiries','action' => 'index']); ?>
    <?= $this->Form->input('customer_id',array(
        'label' => '会員ID',
        'type' => 'text')); ?>
    <?= $this->Form->input('inquiry_category',array(
        'label' => 'お問い合わせ種類')); ?>
    <?= $this->Form->input('content',array(
        'label' => '内容')); ?>
    <?= $this->Form->input('created',array(
        'label' => '作成日時')); ?>
    <?= $this->Form->input('',array(
        'label' => '更新日時')); ?>
    <?= $this->Form->end(__('登録')); ?>
</div>