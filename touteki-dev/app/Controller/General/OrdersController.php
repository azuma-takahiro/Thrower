<?php

App::uses('AppController', 'Controller');

class OrdersController extends AppController {
    public $uses          = [
        'Order',
        'Item',
    ];
    public $helpers       = [];
    public $components    = [
        'Flash'
    ];

    public function beforeFilter() {
        parent::beforeFilter();
//        $this->Auth->allow();
        $this->layout = "general";
        $this->set('auth_customer', $this->Auth->Customer);
    }

    # index == add
    public function index() {
        // 追加フォームからの情報を受け取る。
        // if($this->request->is('post') || $this->request->is('put')) {
        //     $this->Order->create();
        //     if($this->Order->save($this->request->data)) {
        //         $this->Flash->success(__('ご登録ありがとうございます'));
        //         // 元の画面に戻す。
        //         return $this->redirect(array('action' => 'index'));
        //     } else {
        //         $this->Flash->error(__('登録に失敗しました、もう一度確認してください。'));
        //     }
        // }
    }

    public function confirm() {
        $in_cart = json_decode($_COOKIE['in_cart'],true);
        $items = [];
        $idx = 0;
        foreach($in_cart as $item_id => $item) {
            $items[$idx] = $this->Item->findById($item_id);
            $items[$idx]['item_num'] = $item['item_num'];
            $idx++;
        }
        $this->request->data['item'] = $items;
    }

    public function save() {
        $buy_items = json_decode($_COOKIE['in_cart'],true);
        echo '購入完了しました';exit;
        debug($this->Auth->user());
        debug($this->request->data);exit;
    }
}
