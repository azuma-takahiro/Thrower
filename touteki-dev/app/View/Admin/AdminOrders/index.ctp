<a href="<?=$this->Html->url(['action' => 'edit']);?>" class="btn btn-primary">登録</a><br>
<?php if (!empty($orders)): ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>注文者名</th>
            <th>購入内容</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>登録日</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= h($order['Order']['id']); ?></td>
                    <td><?php echo h($order['Customer']['last_name']) ?>&nbsp;<?php echo h($order['Customer']['first_name']); ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['controller' =>'AdminOrderDetails', 'action' => 'index',h($order['Order']['id'])]);?>" class="btn btn-info">購入確認</a>
                    </td>
                    <td><?= h($order['Order']['dest_address1']); ?>&nbsp;<?= h($order['Order']['dest_address2']); ?></td>
                    <td><?= h($order['Order']['dest_phone_number']); ?></td>
                    <td><?= h($order['Order']['created']); ?></td>
                    <td><?= h($order['Order']['modified']); ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',h($order['Order']['id'])]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',h($order['Order']['id'])]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <?php echo "登録されている情報はありません"?>
<?php endif; ?>