<?php

App::uses('AdminController', 'Controller');

class AdminCustomerController extends AdminController {
    public $extra_uses          = [
        'Customer',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}