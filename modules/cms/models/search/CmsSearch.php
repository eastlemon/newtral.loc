<?php

namespace app\modules\cms\models\search;

use yii\data\ActiveDataProvider;
use app\modules\cms\models\CmsModel;

class CmsSearch extends CmsModel
{
    public $pageSize = 10;

    public function rules(): array
    {
        return [
            [['url', 'title'], 'string'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = CmsModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        
        $query->andFilterWhere(['like', 'url', $this->url]);
        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
