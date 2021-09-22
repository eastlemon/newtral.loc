<?php

namespace app\modules\admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producer;

class ProducerSearch extends Producer
{
    public function rules()
    {
        return [
            [['id', 'in_menu'], 'integer'],
            [['name', 'slug'], 'safe'],
        ];
    }
    
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Producer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => ['name', 'slug']
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'in_menu' => $this->in_menu,
        ]);

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
