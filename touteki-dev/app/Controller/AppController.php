<?php

App::uses('Controller', 'Controller');

/**
 * 全体共通処理のみ記述
 */
class AppController extends Controller {
    public $components = [
        'DebugKit.Toolbar',
    ];
}
