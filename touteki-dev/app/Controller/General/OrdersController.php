<?php

App::uses('GeneralController', 'Controller');

class OrdersController extends AdminController {
    public $extra_uses          = [
        'Order',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
