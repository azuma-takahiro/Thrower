<?php

App::uses('AdminController', 'Controller');

class AdminUsersController extends AdminController {
    public $uses          = [
        'User',
    ];
    public $components    = [
        'Flash',
    ];
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
    }

    /**
     * 新規・編集画面
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id = null) {
        if(!empty($id)) {
            $user = $this->User->findById($id);
            $this->request->data = $user;
        }
    }

    /**
     * 新規登録用メソッド
     */
    public function save() {
        if ($this->request->onlyAllow('post','put')) {
            $data = $this->request->data;

            if(empty($data['id'])) {
                $this->User->create();
            } else {
                $this->User->id = $data['id'];
            }

            $this->User->set($data);

            if($this->User->validates()) {
                $this->User->save($data);
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

        $this->User->id = $id;

        $this->User->saveField('delete_flg', 1);

        $msg = sprintf('ユーザ ID:%sを削除しました。',$id);

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