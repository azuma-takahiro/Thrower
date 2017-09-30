<a href="<?=$this->Html->url(['action' => 'edit']);?>" class="btn btn-primary">登録</a><br />
<br />
<?php echo $this->Paginator->counter(array('format' => __('登録総数：  {:count}件')));?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id','ID'); ?></th>
            <th>商品名</th>
            <th width = "80px"><?php echo $this->Paginator->sort('item_category','カテゴリ'); ?></th>
            <th>メーカーID</th>
            <th width = "400px">商品説明</th>
            <th width = "90px"><?php echo $this->Paginator->sort('price','価格(税込)'); ?></th>
            <th>画像URL</th>
            <th><?php echo $this->Paginator->sort('created','作成日'); ?></th>
            <th><?php echo $this->Paginator->sort('modified','更新日'); ?></th>
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
<CENTER>
<?php echo $this->Paginator->prev('前へ'); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('次へ'); ?>
</CENTER>