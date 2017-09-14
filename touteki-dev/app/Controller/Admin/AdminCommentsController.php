<?php

App::uses('AdminController', 'Controller');

class AdminCommentsController extends AdminController {
    public $uses          = [
        'Comment'
    ];
    public $components    = [
        'Flash'
    ];
    public $helpers       = [];


    public function index() {
        $comments = $this->Comment->getCommentList();
        $this->set('comments', $comments);
    }

    /**
     * 新規・編集画面
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id = null) {
        if(!empty($id)) {
            $comment = $this->Comment->findById($id);
            $this->request->data = $comment;
        }
    }

    /**
     * 登録用メソッド
     */
    public function save() {
        if ($this->request->onlyAllow('post','put')) {
            $data = $this->request->data;

            if(empty($data['id'])) {
                $this->Comment->create();
            } else {
                $this->Comment->id = $data['id'];
            }

            $this->Comment->set($data);

            if($this->Comment->validates()) {
                $this->Comment->save($data);

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
