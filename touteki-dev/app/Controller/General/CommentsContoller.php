<?php

App::uses('GeneralController', 'Controller');

class CommentsController extends AdminController {
    public $extra_uses          = [
        'Comment',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
