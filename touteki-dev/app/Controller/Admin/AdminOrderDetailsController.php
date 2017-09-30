<?php

App::uses('AdminController', 'Controller');

class AdminOrderDetailsController extends AdminController {
    public $uses          = [
        'OrderDetail',
    ];
    public $components    = [
        'Flash'];
    public $helpers       = [];

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('add', 'logout');
        // $this->set('uri_segment', explode('/', $_SERVER['REQUEST_URI']));
    }

    public function index() {
        $id = $this->request->pass[0];
        $options = array(
            'conditions' => array(
                'OrderDetail.order_id' => $id),
                'OrderDetail.delete_flg' => 0,
            );
        $orderdetails = $this->OrderDetail->find('all', $options);
        $this->set('orderdetails', $orderdetails);

        $params = array(
            'fields' => array(
                'sum(OrderDetail.quantity*Item.price) as totalprice'
                ),
            'conditions' => array(
                'OrderDetail.order_id' => $id),
                'OrderDetail.delete_flg' => 0,
            );
        $totalprice = $this->OrderDetail->find('first',$params);
        $this->set('totalprice',$totalprice);
    }

    public function edit($id = null) {
        if(!empty($id)) {
            $orderdetails = $this->OrderDetail->findById($id);
            $this->request->data = $orderdetails;
        }
    }

    public function save() {
        if ($this->request->onlyAllow('post','put')) {
            $data = $this->request->data;

            if(empty($data['id'])) {
                $this->OrderDetail->create();
            } else {
                $this->OrderDetail->id = $data['id'];
            }

            $this->OrderDetail->set($data);

            if($this->OrderDetail->validates()) {
                $this->OrderDetail->save($data);
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
        $this->OrderDetail->id = $id;

        $this->OrderDetail->saveField('delete_flg', 1);

        $msg = sprintf('受注 ID:%sを削除しました。',$id);

        $this->Flash->set($msg);

        $this->redirect(['action'=>'index']);
    }
}
