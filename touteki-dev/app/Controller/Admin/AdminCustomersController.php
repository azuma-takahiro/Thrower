<?php

App::uses('AdminController', 'Controller');

class AdminCustomersController extends AdminController {
    public $uses          = [
        'Customer',
    ];
    public $helpers = [];
    public $components = [
        'Flash','Paginator'
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
        $this->Paginator->settings = array(
            'limit' => 20,
            'order' => array(
                'Customer.id' => 'DESC'
            ),
            'conditions' => array(
                'Customer.delete_flg' => 0
            ),
        );
        $customers = $this->Paginator->Paginate();
        $this->set('customers',$customers);
    }

    public function add() {
        if($this->request->onlyAllow('post','put')) {
            $this->Customer->create();
            if($this->Customer->save($this->request->data)) {
                $this->Flash->success(__('登録成功しました。'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('登録失敗しました。やり直してください。'));
            }
        } else {
            throw new MethodNotAllowedException;
            return;
        }
    }

    public function edit($id = null) {
        if(!empty($id)) {
            $Customer = $this->Customer->findById($id);
            $this->request->data = $Customer;
        }
    }

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