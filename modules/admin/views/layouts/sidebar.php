<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link">
        <img src="/images/admin-logo.png" class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= Yii::t('app', 'Control') ?></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image text-white bg-dark"><i class="fas fa-user-circle fa-2x"></i></div>
            <div class="info"><a href="/account" class="d-block"><?= Yii::$app->user->identity->username ?></a></div>
        </div>
        <nav class="mt-2">
            <?= \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => Yii::t('app', 'Parts'), 'icon' => 'ring', 'url' => ['/admin/part'], 'active' => $this->context->id == 'part'],
                    ['label' => Yii::t('app', 'Nodes'), 'icon' => 'cube', 'url' => ['/admin/node'], 'active' => $this->context->id == 'node'],
                    ['label' => Yii::t('app', 'Units'), 'icon' => 'cubes', 'url' => ['/admin/unit'], 'active' => $this->context->id == 'unit'],

                    ['label' => Yii::t('app', 'Administration'), 'header' => true],
                    ['label' => Yii::t('app', 'Offices'), 'icon' => 'building', 'url' => ['/admin/office'], 'active' => $this->context->id == 'office'],
                    ['label' => Yii::t('app', 'Stores'), 'icon' => 'store', 'url' => ['/admin/store'], 'active' => $this->context->id == 'store'],

                    ['label' => Yii::t('app', 'Subdivisions'), 'header' => true],
                    ['label' => Yii::t('app', 'Categories'), 'icon' => 'object-group', 'url' => ['/admin/category'], 'active' => $this->context->id == 'category'],
                    ['label' => Yii::t('app', 'Producers'), 'icon' => 'industry', 'url' => ['/admin/producer'], 'active' => $this->context->id == 'producer'],
                    
                    ['label' => Yii::t('app', 'Other'), 'header' => true],
                    ['label' => Yii::t('app', 'Certificates'), 'icon' => 'certificate', 'url' => ['/admin/certificate'], 'active' => $this->context->id == 'certificate'],
                    [
                        'label' => Yii::t('app', 'Settings'),
                        'icon' => 'cogs',
                        'items' => [
                            ['label' => Yii::t('app', 'List'), 'url' => ['/admin/settings-storage'], 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Slides'), 'url' => ['/admin/slide'], 'iconStyle' => 'far'],
                        ]
                    ],
                ],
            ]) ?>
        </nav>
    </div>
</aside>