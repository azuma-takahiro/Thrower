<?php

App::uses('AppController', 'Controller');

/**
 * 管理者用コントローラー共通コントローラー
 * Adminなんちゃらコントローラーの共通処理をここに書く
 */
class AdminController extends AppController {
    public $extra_components    = [];
    public $extra_uses          = [];
    public $extra_helpers       = [];

    public function __constract() {
        parent:: __constract();
        $this->__mergeExtra();
    }

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

    private function __mergeExtra() {
        $this->components = array_merge($this->components, $this->extra_components);
        $this->uses = array_merge($this->uses, $this->extra_uses);
        $this->helpers = array_merge($this->helpers, $this->extra_helpers);
    }
}
