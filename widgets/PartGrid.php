<?php

namespace app\widgets;

use Yii;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\base\Widget;
use yii\grid\GridView;

class PartGrid extends Widget
{
    public $dataProvider;

    public function init()
    {
        parent::init();
        Yii::$app->formatter->nullDisplay = 'N\A';
    }

    public function run()
    {
        return GridView::widget([
            'dataProvider' => $this->dataProvider,
            'columns' => [
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'contentOptions' => ['style' => 'width:1px;'],
                ],
                [
                    'attribute' => 'picture',
                    'format' => 'html',
                    'value' => function ($data) {
                        return ($pp = $data->partPictures[0]) ? Html::img(Url::to('@web/uploads/') . $pp->picture, ['width' => '70px']) : Html::img(Url::to('@web/images/noImage100x100.png'), ['width' => '70px']);
                    },
                    'contentOptions' => ['style' => 'width:1px;'],
                    'label' => Yii::t('app', 'Picture'),
                ],
                [
                    'attribute' => 'producer_id',
                    'value' => 'producer.name',
                    'label' => Yii::t('app', 'Producer'),
                ],
                [
                    'attribute' => 'articul',
                    'value' => 'articul',
                    'label' => Yii::t('app', 'Articul'),
                ],
                [
                    'attribute' => 'name',
                    'format' => 'html',
                    'value' => function ($data) {
                        return '<p>' . $data->name . '</p><p class="mt-1">' . Html::a('<i class="fas fa-eye"></i>', Url::to(['/part']) . '/' . $data->slug, ['class' => 'btn btn-success btn-sm']) . '&nbsp;' . Html::a('<i class="far fa-bookmark"></i>', '#', ['class' => 'btn btn-warning btn-sm']) . '</p>';
                    },
                    'label' => Yii::t('app', 'Name'),
                ],
                [
                    'attribute' => 'warehouse',
                    'format' => 'html',
                    'value' => function ($data) {
                        foreach ($data->offers as $offer) {
                            if ($offer->amount > 0) $_r .= '<p class="mb-1 text-nowrap"><span class="border border-dark rounded-sm px-2">' . $offer->store->name . '</span></p>';
                            if (++$k >= 3) break;
                        }
                        return $_r;
                    },
                    'label' => Yii::t('app', 'Warehouse'),
                    'contentOptions' => ['style' => 'width:1px;'],
                ],
                [
                    'attribute' => 'availability',
                    'format' => 'html',
                    'value' => function ($data) {
                        foreach ($data->offers as $offer) {
                            if ($offer->amount > 0) $_r .= '<p class="mb-1">' . $offer->amount . '</p>';
                            if (++$k >= 3) break;
                        }
                        return $_r;
                    },
                    'label' => Yii::t('app', 'Availability'),
                    'contentOptions' => ['style' => 'width:1px;'],
                ],
                [
                    'attribute' => 'timing',
                    'format' => 'html',
                    'value' => function ($data) {
                        foreach ($data->offers as $offer) {
                            if ($offer->amount > 0) $_r .= '<p class="mb-1">' . $offer->store->officeStores[0]->delivery . ' д.</p>';
                            if (++$k >= 3) break;
                        }
                        return $_r;
                    },
                    'label' => Yii::t('app', 'Timing'),
                    'contentOptions' => ['style' => 'width:1px;'],
                ],
                [
                    'attribute' => 'price-with-vat',
                    'format' => 'html',
                    'value' => function ($data) {
                        foreach ($data->offers as $offer) {
                            if ($offer->amount > 0) $_r .= '<p class="font-weight-bold text-nowrap mb-1">' . Yii::$app->formatter->asCurrency($offer->price) . '&nbsp;' . Html::a('<i class="fas fa-cart-plus"></i>', ['cart/add', 'slug' => $data->slug, 'store' => $offer->store->id]) . '</p>';
                            if (++$k >= 3) break;
                        }
                        $count = count($data->offers);
                        return $_r . (($count > 3) ? '<p class="mb-1">' . Html::a('+ ' . Yii::t('app', 'More') . ' ' . ($count - 3), ['show-more', 'slug' => $data->slug]) . '</p>' : '');
                    },
                    'label' => Yii::t('app', 'Price with VAT'),
                    'contentOptions' => ['style' => 'width:1px;'],
                ],
            ],
        ]);
    }
}