<?php

App::uses('GeneralController', 'Controller');

class InquiriesController extends GeneralController {
    public $uses          = [
        'Inquiry',
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
            $this->Inquiry->create();
            if($this->Inquiry->save($this->request->data)) {
                $this->Flash->success(__('お問い合わせありがとうございます'));
                // 元の画面に戻す。
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('投稿に失敗しました。もう一度確認してください。'));
            }
        }
    }
}
