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

    public function index($id = null) {

        $recursive = 0;

        // $category = $item['Item']['item_category'];

        $conditions = [
        'Item.item_category' => $id,
        ];

        $recursive = 0;

        $order = [
        'Item.id' => 'ASC'
        ];

        $cat_items = $this->Item->find('all',compact('conditions','recursive','order'));
        $cat_items = Hash::extract($cat_items,'{n}.Item');
        $this->set('items',$cat_items);
    }

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
