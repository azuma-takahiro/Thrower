<?php

App::uses('AdminController', 'Controller');

class AdminCommentsController extends AdminController {
    public $extra_uses          = [
        'Comment',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
