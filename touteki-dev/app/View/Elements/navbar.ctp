<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
            <span class="sr-only">メニュー</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div id="gnavi" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="<?= $this->name === 'AdminUsers' ? 'active' : '' ?>" ><a href="/AdminUsers">管理者管理</a></li>
            <li class="<?= $this->name === 'AdminCustomers' ? 'active' : '' ?>"><a href="/AdminCustomers">顧客管理</a></li>
            <li class="<?= $this->name === 'AdminItems' ? 'active' : '' ?>"><a href="/AdminItems">商品管理</a></li>
            <li class="<?= $this->name === 'AdminOrders' ? 'active' : '' ?>"><a href="/AdminOrders">受注管理</a></li>
            <li class="<?= $this->name === 'AdminComments' ? 'active' : '' ?>"><a href="/AdminComments">レビュー管理</a></li>
            <li class="<?= $this->name === 'AdminInquiry' ? 'active' : '' ?>"><a href="AdminInquiries">お問い合わせ管理</a></li>
        </ul>
    </div>
</nav>