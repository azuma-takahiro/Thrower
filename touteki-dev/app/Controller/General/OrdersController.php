<?php

App::uses('AppController', 'Controller');

class OrdersController extends AppController {
    public $uses          = [
        'Order',
    ];
    public $helpers       = [];
    public $components    = [
        'Flash'
    ];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
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
        $this->request->data['item'] = $in_cart;
    }
}
