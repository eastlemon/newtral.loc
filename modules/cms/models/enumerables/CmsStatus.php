<?php

namespace app\modules\cms\models\enumerables;

use yii2mod\enum\helpers\BaseEnum;

class CmsStatus extends BaseEnum
{
    const ENABLED = 1;
    const DISABLED = 0;

    /**
     * @var string message category
     */
    public static $messageCategory = 'yii2mod.cms';

    /**
     * @var array
     */
    public static $list = [
        self::ENABLED => 'Enabled',
        self::DISABLED => 'Disabled',
    ];
}
