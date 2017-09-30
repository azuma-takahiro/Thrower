<?php

App::uses('GeneralController', 'Controller');

class ItemsController extends GeneralController {
    public $uses          = [
        'Item',
    ];
    public $components    = [];
    public $helpers       = [];

    public function top() {

    }

    // public function index() {
    //
    // }

    public function detail($id = null) {
        if(!$id) {
            throw new NotFoundException;
            return;
        }

        $item = $this->Item->findById($id);

        if(!$item) {
            throw new NotFoundException;
            return;
        }

        $category = $item['Item']['item_category'];

        $conditions = [
            'Item.item_category' => $category,
        ];

        $recursive = 0;

        $order = [
            'Item.id' => 'ASC'
        ];

        $same_cat_items = $this->Item->find('all',compact('conditions','recursive','order'));
        $this->set(compact('item','same_cat_items'));
    }

}
