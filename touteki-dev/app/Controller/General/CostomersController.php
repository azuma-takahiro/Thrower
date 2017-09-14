<?php

App::uses('GeneralController', 'Controller');

class CustomersController extends GeneralController {
    public $uses          = [
        'Costomer',
    ];
    public $components    = [];
    public $helpers       = [];
}