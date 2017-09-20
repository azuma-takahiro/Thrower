<?php

App::uses('AdminController', 'Controller');

class AdminCustomersController extends AdminController {
    public $uses          = [
        'Customer',
    ];
    public $helpers = [];
    public $components = [
        'Flash'
    ];


    public function beforeFilter() {
        parent::beforeFilter();

        $gender = configure::read('gender');
        $this->set('gender', $gender);

        $prefecture = configure::read('prefecture');
        $this->set('prefecture', $prefecture);

        $prime_flg = configure::read('prime_flg');
        $this->set('prime_flg', $prime_flg);

    }

    public function index() {
        // $list = 顧客一覧
        $customers = $this->Customer->getCustomerList();
        $this->set('customers',$customers);

    }

    // public function add() {
    //     if($this->request->onlyAllow('post','put')) {
    //         $this->Customer->create();
    //         if($this->Customer->save($this->request->data)) {
    //             $this->Flash->success(__('登録成功しました。'));
    //             return $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Flash->error(__('登録失敗しました。やり直してください。'));
    //         }
    //     } else {
    //         throw new MethodNotAllowedException;
    //         return;
    //     }
    // }

    public function edit($id = null) {
        $this->Customer->id = $id;
        if(!$this->Customer->exists()) {
            throw new NotFoundException(__('その顧客データは存在しません。'));
        }
        if($this->request->is('post') || $this->request->is('put')) {
            if($this->Customer->save($this->request->data)) {
                $this->Flash->success('保存に成功しました。');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('保存に失敗しました。'));
            }
        } else {
            $this->request->data = $this->Customer->findById($id);
            unset($this->request->data['Customer']['password']);
        }

    }

    public function delete($id = null) {
        $this->Customer->id = $id;
        if(!$this->Customer->exists()) {
            throw new NotFoundException(__('その顧客データは存在しません。'));
        }
        if($this->Customer->delete()) {
            $this->Flash->success(__('削除に成功しました。'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('削除に失敗しました。'));
        return $this->redirect(array('action' => 'index'));
    }
}