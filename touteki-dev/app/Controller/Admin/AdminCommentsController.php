<?php

App::uses('AdminController', 'Controller');

class AdminCommentsController extends AdminController {
    public $uses          = [
        'Comment'
    ];
    public $components    = [
        'Flash','Paginator'
    ];
    public $helpers       = [];


    public function index() {
        $this->Paginator->settings = array(
            'limit' => 20,
            'order' => array(
                'Comment.id' => 'DESC'
            ),
            'conditions' => array(
                'Comment.delete_flg' => 0
            ),
        );
        $comments = $this->Paginator->Paginate();
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

        /**
     * 削除用メソッド
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id = null) {
        // id がないことはありえないのでエラーを吐き出す
        if (!$id) {
            throw new ForbiddenException;
            return;
        }
        // Userモデルにidをセット
        $this->Comment->id = $id;

        // saveFieldで１カラムだけの変更。ここではdelete_flgカラムを指定して、論理削除を行う
        $this->Comment->saveField('delete_flg', 1);

        // メッセージ用変数に格納
        $msg = sprintf('レビュー ID:%sを削除しました。',$id);

        // Flashコンポーネントを使用してメッセージの表示
        $this->Flash->set($msg);

        // indexへリダイレクト
        $this->redirect(['action'=>'index']);
    }



}
