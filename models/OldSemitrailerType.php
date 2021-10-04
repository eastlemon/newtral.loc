<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "old_semitrailer_type".
 *
 * @property int $id
 * @property string $name
 */
class OldSemitrailerType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'old_semitrailer_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
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
        ];
    }

    public function getOldSemitrailerModels()
    {
        return $this->hasMany(OldSemitrailerModel::className(), ['id' => 'semitrailer_model_id']);
    }
}
