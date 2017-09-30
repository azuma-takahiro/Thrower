<?php if (!empty($orderdetails)): ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>商品番号</th>
            <th>商品名</th>
            <th>単価</th>
            <th>個数</th>
            <th>金額（税込）</th>
            <th>注文日</th>
            <th>登録日</th>
            <th>更新日</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($orderdetails as $orderdetail): ?>
                <tr>
                    <td><?= h($orderdetail['OrderDetail']['id']); ?></td>
                    <td><?= h($orderdetail['OrderDetail']['item_id']); ?></td>
                    <td><?= h($orderdetail['Item']['item_name']); ?></td>
                    <td>￥<?= h($orderdetail['Item']['price']); ?></td>
                    <td><?= h($orderdetail['OrderDetail']['quantity']); ?></td>
                    <td>￥
                    <?php
                     $subtotal=h($orderdetail['Item']['price'])*h($orderdetail['OrderDetail']['quantity']);
                    echo $subtotal;
                    ?></td>
                    <td><?= h($orderdetail['OrderDetail']['order_date']); ?></td>
                    <td><?= h($orderdetail['OrderDetail']['created']); ?></td>
                    <td><?= h($orderdetail['OrderDetail']['modified']); ?></td>
                    <td>
                        <a href="<?=$this->Html->url(['action' => 'edit',h($orderdetail['OrderDetail']['id'])]);?>" class="btn btn-info">編集</a>
                        <a href="<?=$this->Html->url(['action' => 'delete',h($orderdetail['OrderDetail']['id'])]);?>" class="btn btn-danger">削除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<div align='right'>
<table class="table table-bordered" style="width:300px">
    <tbody>
        <tr>
            <td>合計金額</td><td>￥<?php echo $totalprice[0]['totalprice'] ;?>円（税込）</td>
        </tr>
    </tbody>
</table>
</div>
<?php else: ?>
    <?php echo "登録されている情報はありません"?>
<?php endif; ?>