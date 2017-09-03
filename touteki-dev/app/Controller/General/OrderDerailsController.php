<?php

App::uses('GeneralController', 'Controller');

class OrderDetailsController extends AdminController {
    public $extra_uses          = [
        'OrderDetail',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
