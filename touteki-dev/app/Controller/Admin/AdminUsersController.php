<?php

App::uses('AdminController', 'Controller');

class AdminUsersController extends AdminController {
    public $uses          = [
        'User',
    ];
    public $components    = [];
    public $helpers       = [];

    public function beforeFilter() {
        // parent::beforeFilter();
        // $this->Auth->allow('add', 'logout');
        $this->set('uri_segment', explode('/', $_SERVER['REQUEST_URI']));
    }

    /**
     * Indexページ表示用メソッド
     * @return [type] [description]
     */
    public function index() {
        $users = $this->User->getUserList();
        $this->set('users', $users);
        // $usersr = $this->User->find('all');
        // debug($usersr);exit;
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('新規ユーザが登録されました。'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('ユーザ登録に失敗しました。もう一度実行してください。')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('ユーザ情報が更新されました'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('ユーザ情報の更新に失敗しました。もう一度実行してください。')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete() {

        $id = $this->request->pass[0];
        $this->User->id = $id;
        $this->User->saveField('deleted', 1);

        $msg = sprintf(
            'ユーザ ID:%sを削除しました。',
            $id
        );

        $this->Flash->set($msg);

        $this->redirect(['action'=>'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Flash->error(__('ユーザ名かパスワードが間違っています！再度入力してください！'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}