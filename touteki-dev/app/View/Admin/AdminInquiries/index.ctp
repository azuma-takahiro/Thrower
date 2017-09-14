<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer_id</th>
            <th>Inquiry_category</th>
            <th>Content</th>
            <th>Created</th>
            <th>Modified</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($inquiries)) : ?>
            <?php foreach($inquiries as $inquiry) : ?>
                <tr>
                    <td><?= $inquiry['Inquiry']['id']; ?></td>
                    <td><?= $inquiry['Inquiry']['customer_id']; ?></td>
                    <td><?= $inquiry['Inquiry']['inquiry_category']; ?></td>
                    <td><?= $inquiry['Inquiry']['content']; ?></td>
                    <td><?= $inquiry['Inquiry']['created']; ?></td>
                    <td><?= $inquiry['Inquiry']['modified']; ?></td>
                    <td><a href="<?= $this->Html->url(['action' => 'edit',$inquiry['Inquiry']['id']]); ?>" class="btn btn-info">編集</a></td>
                    <td><a href="<?= $this->Html->url(['action' => 'delete',$inquiry['Inquiry']['id']]); ?>" class="btn btn-danger">削除</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
    </tbody>
</table>