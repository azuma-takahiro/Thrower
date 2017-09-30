<?php

App::uses('AppController', 'Controller');

/**
 * WEBページ用コントローラー共通コントローラー
 * WEBページ用コントローラーの共通処理はここに書く
 */
 class GeneralController extends AppController {
     public $components = [
        'Session',
        'Auth' => [
            // 認証時の設定
            'authenticate' => [
                'Form' => [
                    // 認証時に使用するモデル
                    'userModel' => 'Customer',
                    // 認証時に使用するモデルのユーザ名とパスワードの対象カラム
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            // ログイン失敗時に出力するメッセージを設定
            'loginError' => 'パスワードもしくはEmailをご確認ください。',
            // ログインしていない場合のメッセージを設定
            'authError' => 'ご利用されるにはログインが必要です。',
            // ログインに使用するアクションを指定
            'loginAction' => [
                'controller' => 'Customers',
                'action' => 'login'
            ],
            // ログイン後のリダイレクト先を指定
            'loginRedirect' => [
                'controller' => 'Customers',
                'action' => 'top'
            ],
            // ログアウト後のリダイレクト先を指定
            'logoutRedirect' => [
                'controller' => 'Customers',
                'action' => 'login']
        ]
     ];

     public $helpers = [
         'Session',
         'Html' => ['className' => 'TwitterBootstrap.BootstrapHtml'],
         'Form' => ['className' => 'TwitterBootstrap.BootstrapForm'],
         'Paginator' => ['className' => 'TwitterBootstrap.BootstrapPaginator'],
      ];

      public $uses = [];

    //  public function __constract() {
    //      parent:: __constract();
    //      $this->__mergeExtra();
    //  }

     public function beforeFilter() {
         parent::beforeFilter();
         $this->layout = 'general';
         // $this->__setAdminAuth();
     }

     private function __setAdminAuth() {
         // $this->Auth->userModel = 'AdminUser';
         // $this->Auth->fields['username'] = 'mail_address';
         // $this->Auth->loginRedirect = '/admin_top';
     }

    //  private function __mergeExtra() {
    //      $this->components = array_merge($this->components, $this->extra_components);
    //      $this->uses = array_merge($this->uses, $this->extra_uses);
    //      $this->helpers = array_merge($this->helpers, $this->extra_helpers);
    //  }
 }
