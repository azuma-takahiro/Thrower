<div class = "inquiries form">
    <?= $this->Form->create('Inquiry',['url' => ['controller' => 'AdminInquiries','action' => 'edit']]); ?>
    <?= $this->Form->input('customer_id',array(
        'label' => '顧客ID',
        'class' => 'form-control',
        'type' => 'text')); ?>
    <?= $this->Form->input('inquiry_category',array(
        'label' => 'お問い合わせ種類',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('content',array(
        'label' => '内容',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('created',array(
        'label' => '作成日時')); ?>
    <?= $this->Form->input('modified',array(
        'label' => '更新日時')); ?>
    <?= $this->Form->hidden('id'); ?>
    <?= $this->Form->end(__('更新')); ?>
</div>