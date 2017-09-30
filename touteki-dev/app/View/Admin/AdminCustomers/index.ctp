<a href="<?=$this->Html->url(['action' => 'edit']);?>" class="btn btn-primary">登録</a><br />
<br />
<?php echo $this->Paginator->counter(array('format' => __('登録総数： {:count}件')));?>
<table class="table table-bordered">
    <tbody>
        <?php if(!empty($customers)) : ?>
            <?php foreach($customers as $customer) : ?>
                <tr>
                    <td rowspan="2" width = "3%" style="vertical-align: middle"><?= h($customer['Customer']['id']); ?></td>
                    <td colspan="2"><?= h($customer['Customer']['last_name']); ?>&nbsp;<?= h($customer['Customer']['first_name']); ?></td>
                    <td colspan="7" width = "13%"><?= h($customer['Customer']['last_name_kana']); ?>&nbsp;<?= h($customer['Customer']['first_name_kana']); ?></td>
                    <td width = "5%"><?php echo strtr(h($customer['Customer']['gender']), $gender) ?></td>
                    <td width = "10%"><?php echo strtr(h($customer['Customer']['prime_flg']),$prime_flg) ?></td>
                    <th width = "5%">email</th>
                    <td colspan="3"><?= h($customer['Customer']['email']); ?></td>
                    <th width = "5%">登録日</th>
                    <td width = "12%"><?= h($customer['Customer']['created']); ?></td>
                    <td rowspan="2" width = "5%" style="vertical-align: middle"><a href="<?= $this->Html->url(['action' => 'edit',h($customer['Customer']['id'])]);?>" class="btn btn-info">編集</a></td>
                    <td rowspan="2" width = "5%"  style="vertical-align: middle"><a href="<?= $this->Html->url(['action' => 'delete',h($customer['Customer']['id'])]); ?>" class="btn btn-danger">削除</a></td>
                </tr>
                <tr>
                    <th width = "6%">郵便番号</th>
                    <td width = "7%"><?= h($customer['Customer']['postal_code']); ?></td>
                    <th width = "3%">住所</th>
                    <td colspan="10"><?php echo strtr(h($customer['Customer']['prefecture']), $prefecture) ?>&nbsp;<?= h($customer['Customer']['address1']); ?>&nbsp;<?= h($customer['Customer']['address2']); ?>&nbsp;</td>
                    <th width = "6%">電話番号</th>
                    <td width = "10%"><?= h($customer['Customer']['phone_number']); ?></td>
                    <th>更新日</th>
                    <td><?= h($customer['Customer']['modified']); ?></td>
                </tr>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<CENTER>
<?php echo $this->Paginator->prev('前へ'); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('次へ'); ?>
</CENTER>