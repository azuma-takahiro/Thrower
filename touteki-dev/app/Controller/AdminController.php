<?php

App::uses('AppController', 'Controller');

/**
 * 管理者用コントローラー共通コントローラー
 * Adminなんちゃらコントローラーの共通処理をここに書く
 */
class AdminController extends AppController {
    // public $extra_components    = [];
    // public $extra_uses          = [];
    // public $extra_helpers       = [];

    public $components = [
        'DebugKit.Toolbar',
    ];

    public $helpers = [
        'Session',
        'Html' => ['className' => 'TwitterBootstrap.BootstrapHtml'],
        'Form' => ['className' => 'TwitterBootstrap.BootstrapForm'],
        'Paginator' => ['className' => 'TwitterBootstrap.BootstrapPaginator'],
     ];

    //  public $layout = 'bootstrap';

    // public function __construct() {
    //     parent:: __construct();
    //     $this->__mergeExtra();
    // }

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->layout = '';
        // $this->__setAdminAuth();
        // $this->set('uri_segment', explode('/', $_SERVER['REQUEST_URI']));
        // $this->Paginator->settings = $this->paginate;
    }

    private function __setAdminAuth() {
        // $this->Auth->userModel = 'AdminUser';
        // $this->Auth->fields['username'] = 'mail_address';
        // $this->Auth->loginRedirect = '/admin_top';
    }

    // private function __mergeExtra() {
    //     $this->components = array_merge($this->components, $this->extra_components);
    //     $this->uses = array_merge($this->uses, $this->extra_uses);
    //     $this->helpers = array_merge($this->helpers, $this->extra_helpers);
    // }


}
