<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>発信者名</th>
            <th>問い合わせ種別</th>
            <th>内容</th>
            <th>作成日</th>
            <th>更新日</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($inquiries)) : ?>
            <?php foreach($inquiries as $inquiry) : ?>
                <tr>
                    <td><?= h($inquiry['Inquiry']['id']); ?></td>
                    <td><?= h($inquiry['Customer']['last_name']); ?>&nbsp;<?= h($inquiry['Customer']['first_name']); ?></td>
                    <td><?php echo strtr(h($inquiry['Inquiry']['inquiry_category']),$inquiry_category); ?></td>
                    <td><?= h($inquiry['Inquiry']['content']); ?></td>
                    <td><?= h($inquiry['Inquiry']['created']); ?></td>
                    <td><?= h($inquiry['Inquiry']['modified']); ?></td>
                    <td><a href="<?= $this->Html->url(['action' => 'edit',h($inquiry['Inquiry']['id'])]); ?>" class="btn btn-info">編集</a></td>
                    <td><a href="<?= $this->Html->url(['action' => 'delete',h($inquiry['Inquiry']['id'])]); ?>" class="btn btn-danger">削除</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
    </tbody>
</table>