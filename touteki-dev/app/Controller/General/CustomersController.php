<?php

App::uses('AppController', 'Controller');

class CustomersController extends AppController {
    public $uses          = [
        'Customer',
    ];
    public $components    = [
    'Flash'
    ];
    public $helpers       = [];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup','signin','signout','save');
    }


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
                $this->redirect(['controller' => 'items','action' => 'top']);
            } else {
                $this->render('edit');
            }

        } else {
            throw new MethodNotAllowedException;
            return;
        }
    }

    public function signin() {
        if($this->request->is('post')) {
            // var_dump($this->request->data);
            // var_dump($this->Auth->authenticate);exit;
            if($this->Auth->login()) {
                $this->redirect([
                    'controller' => 'items',
                    'action' => 'top'
                ]);
            } else {
                $this->Flash->error(__('ユーザ名かパスワードが間違っています！再度入力してください！'));
            }
        }
    }

    public function signout() {
        $this->redirect($this->Auth->logout());
    }
}