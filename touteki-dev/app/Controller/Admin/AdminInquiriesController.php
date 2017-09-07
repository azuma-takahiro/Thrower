<?php

App::uses('AdminController', 'Controller');

class AdminInquiriesController extends AdminController {
    public $extra_uses          = [
        'Inquiry',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}