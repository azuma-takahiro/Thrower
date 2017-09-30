<a href="<?=$this->Html->url(['action' => 'edit']);?>" class="btn btn-primary">登録</a>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>商品カテゴリ</th>
            <th>メーカーID</th>
            <th>商品説明</th>
            <th>価格</th>
            <th>画像URL</th>
            <th>作成日</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= h($item['Item']['id']); ?></td>
                    <td><?= h($item['Item']['item_name']); ?></td>
                    <td><?php echo strtr(h($item['Item']['item_category']),$item_category); ?></td>
                    <td><?= h($item['Item']['maker_id']); ?></td>
                    <td><?= h($item['Item']['description']); ?></td>
                    <td>￥<?= h($item['Item']['price']); ?></td>
                    <td><?= h($item['Item']['picture_url']); ?></td>
                    <td><?= h($item['Item']['created']); ?></td>
                    <td><?= h($item['Item']['modified']); ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',h($item['Item']['id'])]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',h($item['Item']['id'])]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>