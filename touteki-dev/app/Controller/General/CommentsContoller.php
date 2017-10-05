<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {
    public $uses          = [
        'Comment',
    ];
    public $components    = [];
    public $helpers       = [];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->layout = "general";
    }

    public function add() {
        
    }
}
