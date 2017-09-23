<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Order
 * @author
 */
class Order extends AppModel {
    public $hasMany = array('OrderDetail');
    public $belongsTo = array('Customer');

    public $validate = [

    ];

    public function getOrderList() {

        $recursive = 0;

        $fields = [
            'Order.id',
            'Order.customer_id',
            'Order.dest_address1',
            'Order.dest_address2',
            'Order.dest_phone_number',
            'Order.created',
            'Order.modified',
            'Customer.id',
            'Customer.first_name',
            'Customer.last_name',
        ];

        $conditions = [
            'Order.delete_flg' => 0,
        ];

        $order = [
            'Order.id DESC'
        ];

        return $this->find('all', compact('recursive', 'fields', 'conditions','order'));
    }
}
