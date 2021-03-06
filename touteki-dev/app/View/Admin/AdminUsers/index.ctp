<a href="<?=$this->Html->url(['action' => 'edit']);?>" class="btn btn-primary">登録</a><br />
<br />
<?php echo $this->Paginator->counter(array('format' => __('登録総数： {:count}件')));?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>パスワード</th>
            <th>権限</th>
            <th>作成日</th>
            <th>更新日</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['User']['id']; ?></td>
                    <td><?= $user['User']['username']; ?></td>
                    <td><?= $user['User']['password']; ?></td>
                    <td><?php echo strtr($user['User']['role'],$role); ?></td>
                    <td><?= $user['User']['created']; ?></td>
                    <td><?= $user['User']['modified']; ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',$user['User']['id']]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',$user['User']['id']]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<CENTER>
<?php echo $this->Paginator->prev('前へ'); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('次へ'); ?>
</CENTER>