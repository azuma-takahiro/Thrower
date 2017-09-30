<?php

App::uses('GeneralController', 'Controller');

class CustomersController extends GeneralController {
    public $uses          = [
        'Customer',
    ];
    public $components    = [
    'Flash'
    ];
    public $helpers       = [];


    public function signup() {
        $this->render('signup');
    }

    /**
     * 登録用メソッド
     */
    public function save() {
        if ($this->request->onlyAllow('post','put')) {
            $data = $this->request->data;

            if(empty($data['id'])) {
                $this->Customer->create();
            } else {
                $this->Customer->id = $data['id'];
            }

            $this->Customer->set($data);

            if($this->Customer->validates()) {
                $this->Customer->save($data);

                $this->Flash->success(__('保存完了しました'));
                $this->redirect(['action' => 'index']);
            } else {
                $this->render('edit');
            }

        } else {
            throw new MethodNotAllowedException;
            return;
        }
    }

}