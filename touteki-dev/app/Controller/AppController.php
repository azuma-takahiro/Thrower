<?php

App::uses('Controller', 'Controller');

/**
 * 全体共通処理のみ記述
 * $components,$helpers,$usesの定義は不可
 */
class AppController extends Controller {
    public $components = [
        'DebugKit.Toolbar',
    ];
    //
    // public $helpers = [
    //        'Session',
    //        'Html' => ['className' => 'TwitterBootstrap.BootstrapHtml'],
    //        'Form' => ['className' => 'TwitterBootstrap.BootstrapForm'],
    //        'Paginator' => ['className' => 'TwitterBootstrap.BootstrapPaginator'],
    //  ];
    //
    //  public $uses = [];
}
