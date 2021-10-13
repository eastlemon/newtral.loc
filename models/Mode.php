<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mode".
 *
 * @property int $id
 * @property string $name
 *
 * @property Trailer[] $trailers
 */
class Mode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mode';
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
     * Gets query for [[Trailers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrailers()
    {
        return $this->hasMany(Trailer::className(), ['mode_id' => 'id']);
    }
}
