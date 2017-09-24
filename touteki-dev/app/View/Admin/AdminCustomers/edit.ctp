<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

<div class = "customers form">
    <?= $this->Form->create('Customer',['url' => ['controller' => 'AdminCustomers','action' => 'save']]); ?>
    <?= $this->Form->input('last_name',array(
        'label' => '姓',
        'style' => 'width: 150px',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('first_name',array(
        'label' => '名',
        'style' => 'width: 150px',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('last_name_kana',array(
        'label' => '姓ふりがな',
        'style' => 'width: 150px',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('first_name_kana',array(
        'style' => 'width: 150px',
        'label' => '名ふりがな',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('gender',array(
        'label' => '性別',
        'type' => 'select',
        'style' => 'width: 80px',
        'options' => $gender,
        'class' => 'form-control')); ?>
    <?= $this->Form->input('email',array(
        'label' => 'メールアドレス',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('postal_code',array(
        'label' => '郵便番号（※ハイフンなし7桁）',
        'maxlength' => 7,
        'style' => 'width: 100px',
        'class' => 'form-control',
        'onKeyUp' => "AjaxZip3.zip2addr(this,'','data[Customer][prefecture]','data[Customer][address1]');")); ?>
    <?= $this->Form->input('prefecture',array(
        'label' => '都道府県',
        'style' => 'width:200px',
        'options' => $prefecture,
        'class' => 'form-control')); ?>
    <?= $this->Form->input('address1',array(
        'label' => '住所',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('address2',array(
        'label' => '建物名',
        'class' => 'form-control')); ?>
    <?= $this->Form->input('phone_number',array(
        'label' => '電話番号（※ハイフンなし）',
        'maxlength' => 11,
        'class' => 'form-control')); ?>
    <?= $this->Form->input('prime_flg',array(
        'label' => '会員区分',
        'type' => 'select',
        'style' => 'width:150px',
        'options' => $prime_flg,
        'class' => 'form-control')); ?>
    <?= $this->Form->hidden('id'); ?>

        <div style="margin-top: 10px; text-align: center;">
        <a href="/AdminCustomers/" class="btn btn-default">戻る</a>
        <button type="submit" class="btn btn-primary">更新</button>
        </div>
    <?= $this->Form->end(); ?>
</div>