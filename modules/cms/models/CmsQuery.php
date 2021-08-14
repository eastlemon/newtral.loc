<?php

namespace app\modules\cms\models;

use yii\db\ActiveQuery;
use app\modules\cms\models\enumerables\CmsStatus;

class CmsQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function enabled()
    {
        return $this->andWhere(['status' => CmsStatus::ENABLED]);
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function byUrl(string $url)
    {
        return $this->andWhere(['url' => $url]);
    }
}
