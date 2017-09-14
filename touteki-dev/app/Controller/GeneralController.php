<?php

App::uses('AppController', 'Controller');

/**
 * WEBページ用コントローラー共通コントローラー
 * WEBページ用コントローラーの共通処理はここに書く
 */
 class GeneralController extends AppController {
     public $components = [
        //  'DebugKit.Toolbar',
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
         // $this->layout = '';
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
