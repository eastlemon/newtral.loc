<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Semitrailers', 'url' => ['semitrailers']];
    $this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['units', 'id' => $unit_id]];
    $this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['nodes', 'id' => $node_id, 'unit_id' => $unit_id]];
    $this->params['breadcrumbs'][] = ['label' => 'Parts', 'url' => ['parts', 'id' => $part_id, 'node_id' => $node_id, 'unit_id' => $unit_id]];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                ],
            ]) ?>
        </div>
    </div>
</div>