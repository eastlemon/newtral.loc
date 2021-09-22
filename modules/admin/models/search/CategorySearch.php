<?php

namespace app\modules\admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

class CategorySearch extends Category
{
    public function rules()
    {
        return [
            [['id', 'parent_id', 'is_popular', 'in_menu'], 'integer'],
            [['name', 'slug'], 'safe'],
        ];
    }
    
    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params)
    {
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => ['name', 'slug', 'parent_id']
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'is_popular' => $this->is_popular,
            'in_menu' => $this->in_menu,
        ]);

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
