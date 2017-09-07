<?php

App::uses('GeneralController', 'Controller');

class CustomersController extends AdminController {
    public $extra_uses          = [
        'Costomer',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}