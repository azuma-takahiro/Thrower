<?php

App::uses('AppController', 'Controller');

class AdminOrdersController extends AppController {
    public $uses          = [
        'Order',
    ];
    public $components    = [
        'Flash','Paginator'
    ];
    public $helpers       = [];

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        // $this->set('uri_segment', explode('/', $_SERVER['REQUEST_URI']));
    }

    public function index() {
        $this->Paginator->settings = array(
            'limit' => 20,
            'order' => array(
                'Order.id' => 'DESC'
                ),
                'order' => array(
                    'Order.id' => 'DESC'
                ),
                'conditions' => array(
                    'Order.delete_flg' => 0
                ),
            );
        $orders = $this->Paginator->Paginate();
        $this->set('orders', $orders);
    }

    public function edit($id = null) {
        if(!empty($id)) {
            $orders = $this->Order->findById($id);
            $this->request->data = $orders;
        }
    }

    public function save() {
        if ($this->request->onlyAllow('post','put')) {
            $data = $this->request->data;

            if(empty($data['id'])) {
                $this->Order->create();
            } else {
                $this->Order->id = $data['id'];
            }

            $this->Order->set($data);

            if($this->Order->validates()) {
                $this->Order->save($data);
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
        if (!$id) {
            throw new ForbiddenException;
            return;
        }
        $this->Order->id = $id;

        $this->Order->saveField('delete_flg', 1);

        $msg = sprintf('受注 ID:%sを削除しました。',$id);

        $this->Flash->set($msg);

        $this->redirect(['action'=>'index']);
    }
}
