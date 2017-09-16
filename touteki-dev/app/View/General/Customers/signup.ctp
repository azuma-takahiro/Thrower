<div class="users form">
    <?php echo $this->Form->create('Customer', ['url' => ['controller' => 'Customers','action' => 'save']]); ?>

        <?=$this->Form->input('last_name', array('class' => 'form-control','type' => 'text', 'label' => '姓'));?>
        <?=$this->Form->input('first_name', array('class' => 'form-control','type' => 'text', 'label' => '名'));?>
        <?=$this->Form->input('last_name_kana', array('class' => 'form-control','type' => 'text', 'label' => '姓(カナ)'));?>
        <?=$this->Form->input('first_name_kana', array('class' => 'form-control','type' => 'text', 'label' => '名(カナ)'));?>
        <?=$this->Form->input('gender', array('type' => 'radio', 'div' => false, 'label' => '性別', 'legend' => false, 'options' => array(1 =>'男', '女')));;?>
        <?=$this->Form->input('email', array('class' => 'form-control','type' => 'text', 'label' => 'メールアドレス'));?>
        <?=$this->Form->input('password', array('class' => 'form-control','type' => 'text', 'label' => 'パスワード'));?>
        <?=$this->Form->input('postal_code', array('class' => 'form-control','type' => 'text', 'label' => '郵便番号'));?>
        <?=$this->Form->input('address1', array('class' => 'form-control','type' => 'text', 'label' => '住所'));?>
        <?=$this->Form->input('address2', array('class' => 'form-control','type' => 'text', 'label' => '番地'));?>
        <?=$this->Form->input('phone_number', array('class' => 'form-control','type' => 'text', 'label' => '電話番号'));?>
        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminComments/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>