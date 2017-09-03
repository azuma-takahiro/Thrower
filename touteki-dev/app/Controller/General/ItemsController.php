<?php

App::uses('GeneralController', 'Controller');

class ItemsController extends AdminController {
    public $extra_uses          = [
        'Item',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
