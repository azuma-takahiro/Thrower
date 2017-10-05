<?php

App::uses('AppController', 'Controller');

class ItemsController extends AppController {
    public $uses          = [
    'Item',
    ];
    public $components    = [];
    public $helpers       = [];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->layout = "general";
    }

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

    public function get_item_ajax() {
        $this->autoRender = false;
        if($this->request->is('ajax')) {
            $id = $this->request->data['id'];
            $item = Hash::extract($this->Item->findById($id), 'Item');
            $this->response->type('json');
            echo json_encode(compact('item'));
        } else {
            throw new MethodNotAllowedException;
            return;
        }
    }

    public function cart(){
        $requests = json_decode($this->request->data['items'],true);
        if(empty($requests)) {
            $this->Flash->error('カートの中に商品が入っていません');
        } else {
            foreach($requests as $idx => $item) {
                $result = $this->Item->findById($idx);
                $result['Item']['item_num'] = $item['item_num'];
                $results[] = $result;
            }
        }

        $this->set(compact('results'));
        // debug($results);exit;

    }

}
