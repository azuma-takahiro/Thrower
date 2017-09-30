<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>投稿者名</th>
            <th>商品カテゴリ</th>
            <th>商品名</th>
            <th>コメント</th>
            <th>登録日</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= h($comment['Comment']['id']); ?></td>
                    <td><?= h($comment['Customer']['last_name']); ?>&nbsp;<?= h($comment['Customer']['first_name']); ?></td>
                    <td><?= strtr(h($comment['Item']['item_category']),configure::read('item_category')); ?></td>
                    <td><?= h($comment['Item']['item_name']); ?></td>
                    <td><?= h($comment['Comment']['comment']); ?></td>
                    <td><?= h($comment['Comment']['created']); ?></td>
                    <td><?= h($comment['Comment']['modified']); ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',h($comment['Comment']['id'])]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',h($comment['Comment']['id'])]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>