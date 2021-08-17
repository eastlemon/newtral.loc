<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dictionary_partmanufacturer".
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 *
 * @property CatalogPart[] $catalogParts
 */
class DictionaryPartmanufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dictionary_partmanufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
            [['logo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
        ];
    }

    /**
     * Gets query for [[CatalogParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogParts()
    {
        return $this->hasMany(CatalogPart::className(), ['manufacturer_id' => 'id']);
    }
    
    public static function findModel($id)
    {
        if (($model = static::findOne($id)) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException(Yii::t('app', 'The requested page {name} does not exist.', [
            'name' => 'DicPrtManf'
        ]));
    }
}
