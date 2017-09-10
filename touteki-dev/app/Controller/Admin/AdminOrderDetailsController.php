<?php

App::uses('AdminController', 'Controller');

class AdminOrderDetailsController extends AdminController {
    public $uses          = [
        'OrderDetail',
    ];
    public $components    = [
        'Flash'];
    public $helpers       = [];


    public function index() {
        $orderdetails = $this->OrderDetail->getOrderDetailList();
        $this->set('orderdetails', $orderdetails);
    }
}
