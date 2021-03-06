<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Part;

class SearchModel extends Model
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
        $query = Part::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query
            ->andFilterWhere(['like', 'articul', $this->search])
            ->orFilterWhere(['like', 'name', $this->search]);

        return $dataProvider;
    }
}