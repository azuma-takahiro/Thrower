<?php

App::uses('GeneralController', 'Controller');

class OrdersController extends GeneralController {
    public $uses          = [
        'Order',
    ];
    public $helpers       = [];
    public $components    = [
        'Flash'
    ];

    public function beforeFilter() {
        parent::beforeFilter();
    }

    # index == add
    public function index() {
        // 追加フォームからの情報を受け取る。
        if($this->request->is('post') || $this->request->is('put')) {
            $this->Order->create();
            if($this->Order->save($this->request->data)) {
                $this->Flash->success(__('ご登録ありがとうございます'));
                // 元の画面に戻す。
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('登録に失敗しました、もう一度確認してください。'));
            }
        }
    }
}
