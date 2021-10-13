<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "markup".
 *
 * @property int $id
 * @property string|null $image
 * @property string $markup
 * @property int $trailer_id
 *
 * @property Trailer $trailer
 */
class Markup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'markup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['markup', 'trailer_id'], 'required'],
            [['trailer_id'], 'integer'],
            [['image', 'markup'], 'string', 'max' => 255],
            [['trailer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trailer::className(), 'targetAttribute' => ['trailer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'markup' => Yii::t('app', 'Markup'),
            'trailer_id' => Yii::t('app', 'Trailer ID'),
        ];
    }

    /**
     * Gets query for [[Trailer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrailer()
    {
        return $this->hasOne(Trailer::className(), ['id' => 'trailer_id']);
    }
}
