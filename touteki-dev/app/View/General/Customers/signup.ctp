<div class="users form container">
    <?php echo $this->Form->create('Customer', ['url' => ['controller' => 'Customers','action' => 'save']]); ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th class="active required">お名前</th>
                <td class="form-inline">
                    <?=$this->Form->input('last_name', array('class' => 'form-control', 'div' => false, 'label' => false, 'type' => 'text', 'placeholder' => '姓'));?>
                    <?=$this->Form->input('first_name', array('class' => 'form-control', 'div' => false, 'label' => false, 'type' => 'text', 'placeholder' => '名'));?></td>
                </tr>
                <tr>
                    <th class="active required">お名前(カナ)</th>
                    <td class="form-inline">
                        <?=$this->Form->input('last_name_kana', array('class' => 'form-control', 'div' => false, 'label' => false, 'type' => 'text', 'placeholder' => '姓(カナ)'));?>
                        <?=$this->Form->input('first_name_kana', array('class' => 'form-control', 'div' => false, 'label' => false, 'type' => 'text', 'placeholder' => '名(カナ)'));?>
                    </td>
                </tr>
                <tr>
                    <th class="active required">性別</th>
                    <td>
                        <?=$this->Form->input('gender', array('type' => 'radio', 'div' => false, 'label' => true, 'legend' => false, 'value' => 1, 'options' => Configure::read('gender')));;?>
                        
                    </td>
                </tr>
                <tr>
                    <th class="active required">メールアドレス</th>
                    <td>
                        <?=$this->Form->input('email', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => 'メールアドレス'));?>
                    </td>
                </tr>
                <tr>
                    <th class="active required">パスワード</th>
                    <td>
                        <?=$this->Form->input('password', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => 'パスワード'));?>
                    </td>
                </tr>
                <tr>
                    <th class="active required">住所</th>
                    <td>
                        <?=$this->Form->input('postal_code', array('class' => 'form-control', 'div' => false,'type' => 'text', 'placeholder' => '郵便番号', 'label' => false));?>
                        <?=$this->Form->input('prefecture', array('class' => 'form-control', 'div' => false, 'type' => 'select', 'options' => Configure::read('prefecture'), 'label' => '都道府県'));?>
                        <?=$this->Form->input('address1', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => '市区町村・番地'));?>
                        <?=$this->Form->input('address2', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => 'マンション名・ビル名'));?>
                    </td>
                </tr>
                <tr>
                    <th class="active required">電話番号</th>
                    <td>
                       <?=$this->Form->input('phone_number', array('class' => 'form-control', 'div' => false,'type' => 'text', 'label' => '電話番号', 'placeholder' => '000-0000-0000'));?>

                   </td>
               </tr>
           </table>
       </div>
       <div style="margin-top: 10px; text-align: center;">
        <a href="/AdminComments/" class="btn btn-default">戻る</a>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
    <?php echo $this->Form->end(); ?>
</div>