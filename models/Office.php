<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property string $name
 *
 * @property OfficeStore[] $officeStores
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[OfficeStores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOfficeStores()
    {
        return $this->hasMany(OfficeStore::className(), ['office_id' => 'id']);
    }
}
