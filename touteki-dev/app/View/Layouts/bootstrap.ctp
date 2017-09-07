<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        <?php // echo __('CakePHP: the rapid development php framework:'); ?>
        <?php echo $title_for_layout; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('bootstrap-responsive.min'); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <!--
    <link rel="shortcut icon" href="/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
    -->
    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
</head>
<body>
    <!-- ヘッダー -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo __('CakePHP'); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="nav navbar-nav">
                    <?php
                        $header_menu_customers = ($uri_segment[2] == 'customers') ? 'active' : '';
                        $header_menu_users     = ($uri_segment[2] == 'users') ? 'active' : '';
                        $header_menu_agencies  = ($uri_segment[2] == 'agencies') ? 'active' : '';
                    ?>
                    <li class="<?php echo $header_menu_customers; ?>">
                    <?php
                        echo $this->Html->link('顧客情報',
                          array('controller' => 'customers', 'action' => 'index'));
                    ?>
                    </li>
                    <li class="<?php echo $header_menu_users; ?>">
                    <?php
                        echo $this->Html->link('管理ユーザー',
                          array('controller' => 'users', 'action' => 'index'));
                    ?>
                    </li>
                    <li class="<?php echo $header_menu_agencies; ?>">
                    <?php
                        echo $this->Html->link('代理店一覧',
                          array('controller' => 'agencies', 'action' => 'index'));
                    ?>
                    </li>
                    <li>
                    <?php
                        echo $this->Html->link('ログアウト',
                          array('controller' => 'sessions', 'action' => 'logout'));
                    ?>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">

        <!-- <h1><?php echo $page_title; ?></h1> -->

        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
 crossorigin="anonymous"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->fetch('script'); ?>

</body>
</html>
