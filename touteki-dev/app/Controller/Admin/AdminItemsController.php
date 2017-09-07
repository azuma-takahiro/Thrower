<?php

App::uses('AdminController', 'Controller');

class AdminItemsController extends AdminController {
    public $extra_uses          = [
        'Item',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}