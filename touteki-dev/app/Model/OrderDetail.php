<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP OrderDetail
 * @author
 */
class OrderDetail extends AppModel {

    public $belongsTo = array('Order','Item');

    public $validate = [
        'item_id' => [
            'required' => [
                'rule' => ['between',4,4],
                'message' => '4桁で入力してください',
            ],
        ],
        'quantity' => [
            'required' => [
                'rule' => ['range',0,101],
                'message' => '1～100までの数字を入力してください',
            ],
        ],
    ];

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
            'Order.id',
        ];

        $conditions = [
            'OrderDetail.order_id' => 'Order.id',
            'OrderDetail.delete_flg' => 0,
        ];

        $order = [
            'OrderDetail.id DESC'
        ];

        return $this->find('all', compact('recursive', 'fields', 'conditions','order'));
    }
}
