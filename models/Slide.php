<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property int $id
 * @property string $header
 * @property string $content
 * @property string $position
 * @property string $picture
 * @property string $link
 */
class Slide extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'content', 'position', 'picture', 'link'], 'required'],
            [['header', 'content', 'position', 'picture', 'link'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'header' => Yii::t('app', 'Header'),
            'content' => Yii::t('app', 'Content'),
            'position' => Yii::t('app', 'Position'),
            'picture' => Yii::t('app', 'Picture'),
            'link' => Yii::t('app', 'Link'),
        ];
    }
}
