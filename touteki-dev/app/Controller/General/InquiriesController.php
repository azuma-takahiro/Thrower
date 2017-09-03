<?php

App::uses('GeneralController', 'Controller');

class InquiriesController extends AdminController {
    public $extra_uses          = [
        'Inquiry',
    ];
    public $extra_components    = [];
    public $extra_helpers       = [];
}
