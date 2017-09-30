<div>
    <?= $this->Form->create('User'); ?>
    <?= $this->Form->input('username',[
            'label' => 'ユーザー名'
    ]); ?>
    <?= $this->Form->input('password',[
            'label' => 'パスワード'
    ]); ?>
    <?= $this->Form->end(__('送信')); ?>
</div>