<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producer".
 *
 * @property int $id
 * @property string|null $name
 * @property string $slug
 * @property int $in_menu
 *
 * @property Part[] $parts
 * @property Unit[] $units
 */
class Producer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug'], 'required'],
            [['slug'], 'string'],
            [['in_menu'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'in_menu' => Yii::t('app', 'In Menu'),
        ];
    }

    /**
     * Gets query for [[Parts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParts()
    {
        return $this->hasMany(Part::className(), ['producer_id' => 'id']);
    }

    /**
     * Gets query for [[Units]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['producer_id' => 'id']);
    }

    public static function getMenuItems()
    {
        return self::find()->where(['in_menu' => 1])->all();
    }
}
