<?php

App::uses('AdminController', 'Controller');

class AdminInquiriesController extends AdminController {
    public $uses          = [
        'Inquiry',
    ];
    public $helpers = [];
    public $components = [
        'Flash'
    ];

    public function beforeFilter() {
        parent::beforeFilter();
    }


    public function index() {
        $inquiries = $this->Inquiry->find('all');
        $this->set('inquiries',$inquiries);
    }

    public function edit($id = null) {
        $this->Inquiry->id = $id;
        if(!$this->Inquiry->exists()) {
            throw new NotFoundException(__('そのお問い合わせデータは存在しません。'));
        }
        if($this->request->is('post') || $this->request->is('put')) {
            if($this->Inquiry->save($this->request->data)) {
                $this->Flash->success('保存に成功しました。');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('保存に失敗しました。'));
            }
        } else {
            $this->request->data = $this->Inquiry->findById($id);
        }
    }

    public function delete($id = null) {
       $this->Inquiry->id = $id;
        if(!$this->Inquiry->exists()) {
            throw new NotFoundException(__('そのお問い合わせデータは存在しません。'));
        }
        if($this->Inquiry->delete()) {
            $this->Flash->success(__('削除に成功しました。'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('削除に失敗しました。'));
        return $this->redirect(array('action' => 'index'));
    }

    // public function add() {
    //  // お問い合わせの入力フォームからの情報を受け取る
    //     if($this->request->onlyAllow('post','put')) {
    //         $this->Inquiry->create();
    //         if($this->Inquiry->sava($this->request->data)) {
    //             $this->Flash->success(__('お問い合わせありがとうございます'));
    //             // どこに飛ばすか明確ではないが、indexに飛ばす。
    //             return $this->redirect(array('action' => 'index'));
    //         } else {
    //         $this->Flash->error(__('投稿に失敗しました。もう一度確認してください。'));
    //         }
    //     } else {
    //         throw new MethodNotAllowedException;
    //         return;
    //     }
    // }
}