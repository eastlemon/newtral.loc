<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part_picture".
 *
 * @property int $id
 * @property string $picture
 * @property int $part_id
 *
 * @property Part $part
 */
class PartPicture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'part_picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picture', 'part_id'], 'required'],
            [['picture'], 'string'],
            [['part_id'], 'integer'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture' => Yii::t('app', 'Picture'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
    }

    /**
     * Gets query for [[Part]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }
}
