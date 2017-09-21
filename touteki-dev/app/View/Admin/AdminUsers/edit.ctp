<div class="users form">
    <?php echo $this->Form->create('User', ['url' => ['controller' => 'AdminUsers','action' => 'save']]); ?>
        <?php if(!empty($this->request->data['User']['id'])):?>
            <?=$this->Form->hidden('id');?>
        <?php endif;?>
        <?=$this->Form->input('username', array('class' => 'form-control'));?>
        <?=$this->Form->input('password', array('class' => 'form-control'));?>
        <?=$this->Form->input('role', ['options' => $role,'class' => 'form-control']);?>
        <div style="margin-top: 10px; text-align: center;">
            <a href="/AdminUsers/" class="btn btn-default">戻る</a>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    <?php echo $this->Form->end(); ?>
</div>