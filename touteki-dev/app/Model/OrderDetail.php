<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP OrderDetail
 * @author
 */
class OrderDetail extends AppModel {

    public function getOrderDetailList() {

        $recursive = 0;

        $fields = [
            'OrderDetail.id',
            'OrderDetail.item_id',
            'OrderDetail.order_id',
            'OrderDetail.quantity',
            'OrderDetail.order_date',
            'OrderDetail.created',
            'OrderDetail.modified',
        ];

        $conditions = [
            'OrderDetail.delete_flg' => 0,
        ];

        $order = [
            'OrderDetail.id DESC'
        ];

        return $this->find('all', compact('recursive', 'fields', 'conditions','order'));
    }
}
