<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>カスタマーID</th>
            <th>商品ID</th>
            <th>コメント</th>
            <th>作成日</th>
            <th>更新日</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment['Comment']['id']; ?></td>
                    <td><?= $comment['Comment']['customer_id']; ?></td>
                    <td><?= $comment['Comment']['item_id']; ?></td>
                    <td><?= $comment['Comment']['comment']; ?></td>
                    <td><?= $comment['Comment']['created']; ?></td>
                    <td><?= $comment['Comment']['modified']; ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',$comment['Comment']['id']]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',$comment['Comment']['id']]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>