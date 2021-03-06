<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/admin/cms/manage/index" class="nav-link"><i class="fas fa-columns"></i>&nbsp;<?= Yii::t('app', 'Pages') ?></a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownUserMenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-users"></i>&nbsp;<?= Yii::t('app', 'Users') ?></a>
            <ul aria-labelledby="dropdownUserMenu" class="dropdown-menu border-0 shadow">
                <li><a href="/admin/user/index" class="dropdown-item"><?= Yii::t('app', 'List') ?></a></li>
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownRbacMenu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= Yii::t('app', 'RBAC') ?></a>
                    <ul aria-labelledby="dropdownRbacMenu" class="dropdown-menu border-0 shadow">
                        <li><a href="/admin/rbac/route" class="dropdown-item"><?= Yii::t('app', 'Route') ?></a></li>
                        <li><a href="/admin/rbac/permission" class="dropdown-item"><?= Yii::t('app', 'Permission') ?></a></li>
                        <li><a href="/admin/rbac/role" class="dropdown-item"><?= Yii::t('app', 'Role') ?></a></li>
                        <li><a href="/admin/rbac/assignment" class="dropdown-item"><?= Yii::t('app', 'Assignment') ?></a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <?= \yii\bootstrap4\Html::a('<i class="fas fa-globe-americas"></i>&nbsp;' . Yii::t('app', 'Go to the site'), ['/'], ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= \yii\bootstrap4\Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
    </ul>
</nav>