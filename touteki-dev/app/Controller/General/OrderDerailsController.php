<?php

App::uses('GeneralController', 'Controller');

class OrderDetailsController extends GeneralController {
    public $uses          = [
        'OrderDetail',
    ];
    public $components    = [];
    public $helpers       = [];
}
