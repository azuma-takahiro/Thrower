<div class = "仮">
    <?= $this->Form->create('Order',['url' => ['contrller' => 'Inquiries','action' => 'index']]) ;?>
    <?= $this->Form->input('customer_id',array(
        'label' => '会員ID',
        'type' => 'text')); ?>
    <?= $this->Form->input('credit_number',array(
        'label' => 'credit_number')); ?>
    <?= $this->Form->input('destination_name',array(
        'label' => 'destination_name')); ?>
    <?= $this->Form->input('dest_postal_code',array(
        'label' => 'dest_postal_code')); ?>
    <?= $this->Form->input('dest_prefecture',array(
        'label' => 'dest_prefecture')); ?>
    <?= $this->Form->input('dest_address1',array(
        'label' => 'dest_address1')); ?>
    <?= $this->Form->input('dest_address2',array(
        'label' => 'dest_address2')); ?>
    <?= $this->Form->input('dest_phone_number',array(
        'label' => 'dest_phone_number')); ?>
    <?= $this->Form->end(__('登録')); ?>
</div>