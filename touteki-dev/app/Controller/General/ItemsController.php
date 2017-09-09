<?php

App::uses('GeneralController', 'Controller');

class ItemsController extends GeneralController {
    public $uses          = [
        'Item',
    ];
    public $components    = [];
    public $helpers       = [];
}
