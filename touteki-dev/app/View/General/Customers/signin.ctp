<div class="users form container">
    <?= $this->Form->create('Customer'); ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th class="active required">メールアドレス</th>
                    <td>
                        <?= $this->Form->input('email',[
                            'class' => 'form-control',
                            'div' => false,
                            'type' => 'text',
                            'label' => 'メールアドレス'
                        ]); ?>
                    </td>
            </tr>
            <tr>
                <th class="active required">パスワード</th>
                    <td>
                        <?= $this->Form->input('password',[
                            'class' => 'form-control',
                            'div' => false,
                            'type' => 'text',
                            'label' => 'パスワード'
                        ]); ?>
                    </td>
            </tr>
        </table>
    </div>
    <div style="margin-top: 10px; text-align: center;">
        <button type="submit" class="btn btn-primary">ログイン</button>
    </div>
    <?= $this->Form->end(); ?>
</div>