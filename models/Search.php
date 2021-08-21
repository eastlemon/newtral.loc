<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model\Product;

class Search extends Model
{
    public $search;

    public function rules()
    {
        return [
            [['search'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search' => Yii::t('app', 'Search'),
        ];
    }

    public function search($params)
    {
        $query = Product::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['=', 'articule', $this->search]);

        return $dataProvider;
    }
}