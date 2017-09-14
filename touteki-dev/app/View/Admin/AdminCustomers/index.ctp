<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>かな</th>
            <th>gender</th>
            <th>email</th>
            <th>postal_code</th>
            <th>prefecture</th>
            <th>address1</th>
            <th>address2</th>
            <th>phone_number</th>
            <th>prime_flg</th>
            <th>created</th>
            <th>modified</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($customers)) : ?>
            <?php foreach($customers as $customer) : ?>
                <tr>
                    <td><?= $customer['Customer']['id']; ?></td>
                    <td><?= $customer['Customer']['last_name']; ?><?= $customer['Customer']['first_name']; ?></td>
                    <td><?= $customer['Customer']['last_name_kana']; ?><?= $customer['Customer']['first_name_kana']; ?></td>
                    <td><?= $gender[$customer['Customer']['gender']]; ?></td>
                    <td><?= $customer['Customer']['email']; ?></td>
                    <td><?= $customer['Customer']['postal_code']; ?></td>
                    <td><?= $customer['Customer']['prefecture']; ?></td>
                    <td><?= $customer['Customer']['address1']; ?></td>
                    <td><?= $customer['Customer']['address2']; ?></td>
                    <td><?= $customer['Customer']['phone_number']; ?></td>
                    <td><?= $primeFlg[$customer['Customer']['prime_flg']]; ?></td>
                    <td><?= $customer['Customer']['created']; ?></td>
                    <td><?= $customer['Customer']['modified']; ?></td>
                    <td><a href="<?= $this->Html->url(['action' => 'edit',$customer['Customer']['id']]);?>" class="btn btn-info">編集</a></td>
                    <td><a href="<?= $this->Html->url(['action' => 'delete',$customer['Customer']['id']]); ?>" class="btn btn-danger">削除</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>