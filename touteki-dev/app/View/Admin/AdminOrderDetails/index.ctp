<?php if (!empty($orderdetails)): ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>商品番号</th>
            <th>注文番号</th>
            <th>個数</th>
            <th>注文日</th>
            <th>登録日</th>
            <th>更新日</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($orderdetails as $orderdetail): ?>
                <tr>
                    <td><?= $orderdetail['OrderDetail']['id']; ?></td>
                    <td><?= $orderdetail['OrderDetail']['item_id']; ?></td>
                    <td><?= $orderdetail['OrderDetail']['order_id']; ?></td>
                    <td><?= $orderdetail['OrderDetail']['quantity']; ?></td>
                    <td><?= $orderdetail['OrderDetail']['order_date']; ?></td>
                    <td><?= $orderdetail['OrderDetail']['created']; ?></td>
                    <td><?= $orderdetail['OrderDetail']['modified']; ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',$orderdetail['OrderDetail']['id']]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',$orderdetail['OrderDetail']['id']]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <?php echo "登録されている情報はありません"?>
<?php endif; ?>