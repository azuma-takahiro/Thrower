<?php

App::uses('AdminController', 'Controller');

class AdminUsersController extends AdminController {
    public $extra_uses          = [
        'User',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}