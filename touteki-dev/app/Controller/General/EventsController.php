<?php

App::uses('AppController', 'Controller');

class EventsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->layout = "general";
    }

    public function index(){

    }

    public function dummy() {

    }
}