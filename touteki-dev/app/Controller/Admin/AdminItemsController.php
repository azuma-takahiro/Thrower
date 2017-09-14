<?php

App::uses('AdminController', 'Controller');

class AdminItemsController extends AdminController {
    // 使用モデル
    public $uses          = [
        'Item',
    ];

    // 使用コンポーネント
    public $components    = [
        'Flash',
    ];
    public $helpers       = [];


    /**
     * 各メソッドの共通処理はここに書く
     * @return [type] [description]
     */
    public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('add', 'logout');
        // $this->set('uri_segment', explode('/', $_SERVER['REQUEST_URI']));
    }

    /**
     * Indexページ表示用メソッド
     * @return [type] [description]
     */
    public function index() {
        // Itemモデルで定義したのgetItemListメソッドを使用して一覧を取得
        $items = $this->Item->getItemList();
        // 変数$Itemsをviewで使えるようにセット
        $this->set('items', $items);
    }

    /**
     * 新規・編集画面
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id = null) {
        // 新規登録も編集も同じeditメソッドを通る
        // URLの/edit/12 ← ここが引数として入ってくるのでその有無を判定
        if(!empty($id)) {
            // idがある場合は編集なので、デフォルトの値をフォームにいれる
            // そのために$idを条件にItem情報1件取得
            $Item = $this->Item->findById($id);
            // この形でviewに送ると、validationエラーで遷移しても値が保持される
            $this->request->data = $Item;
        }
    }

    /**
     * 新規登録用メソッド
     */
    public function save() {
        // post,put以外の形を許可しない
        if ($this->request->onlyAllow('post','put')) {
            // リクエストデータを変数へ格納
            $data = $this->request->data;

            // 新規登録と更新で処理を分ける
            if(empty($data['id'])) {
                // 新規登録の場合はモデルを初期化
                $this->Item->create();
            } else {
                // 更新の場合はモデルにidをセット
                $this->Item->id = $data['id'];
            }

            // validationにかけるためにモデルにデータをセット
            $this->Item->set($data);

            // ここでvalidationにかける。validationエラーが起きなければture,起きたらfalseが帰ってくる
            if($this->Item->validates()) {
                // 上記がtrueのときの処理
                // saveメソッドで値を保存
                $this->Item->save($data);
                // Flashコンポーネントを使って、次にリダイレクトする先にメッセージを表示する。
                $this->Flash->success(__('保存完了しました'));
                // indexへリダイレクト
                $this->redirect(['action' => 'index']);
            } else {
                // validationエラーが起きたのでeditに戻る
                $this->render('edit');
            }

        } else {
            // post,put以外でアクセスされた時のエラー処理
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
        // Itemモデルにidをセット
        $this->Item->id = $id;

        // saveFieldで１カラムだけの変更。ここではdelete_flgカラムを指定して、論理削除を行う
        $this->Item->saveField('delete_flg', 1);

        // メッセージ用変数に格納
        $msg = sprintf(' ID:%sを削除しました。',$id);

        // Flashコンポーネントを使用してメッセージの表示
        $this->Flash->set($msg);

        // indexへリダイレクト
        $this->redirect(['action'=>'index']);
    }
}