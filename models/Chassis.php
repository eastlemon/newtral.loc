<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chassis".
 *
 * @property int $id
 * @property string $name
 * @property string|null $picture
 *
 * @property Trailer[] $trailers
 */
class Chassis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chassis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'picture'], 'string', 'max' => 255],
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
            'picture' => Yii::t('app', 'Picture'),
        ];
    }

    /**
     * Gets query for [[Trailers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrailers()
    {
        return $this->hasMany(Trailer::className(), ['chassis_id' => 'id']);
    }
}
