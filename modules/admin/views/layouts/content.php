<div class="content-wrapper">
    <div class="content-header">
        <?= \app\widgets\Alert::widget() ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <?= \yii\bootstrap4\Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <?= $content ?>
    </div>
</div>