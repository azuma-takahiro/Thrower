<?php

App::uses('AppController', 'Controller');

class OrderDetailsController extends AppController {
    public $uses          = [
        'OrderDetail',
    ];
    public $components    = [];
    public $helpers       = [];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->layout = "general";
    }
}
