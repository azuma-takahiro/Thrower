<?php

App::uses('AdminController', 'Controller');

class AdminOrderDetailsController extends AdminController {
    public $extra_uses          = [
        'OrderDetail',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
