<?php

namespace app\models;

use Yii;
use app\models\UploadForm;

/**
 * This is the model class for table "trailer".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string $markup
 * @property int $producer_id
 * @property int $type_id
 * @property int $mode_id
 * @property int $axis_id
 * @property int $chassis_id
 *
 * @property Markup[] $markups
 * @property Axis $axis
 * @property Chassis $chassis
 * @property Mode $mode
 * @property Producer $producer
 * @property Type $type
 * @property UserTrailer[] $userTrailers
 */
class Trailer extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trailer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'producer_id', 'type_id', 'mode_id', 'axis_id', 'chassis_id'], 'required'],
            [['markup'], 'string'],
            [['producer_id', 'type_id', 'mode_id', 'axis_id', 'chassis_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['axis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Axis::className(), 'targetAttribute' => ['axis_id' => 'id']],
            [['chassis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chassis::className(), 'targetAttribute' => ['chassis_id' => 'id']],
            [['mode_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mode::className(), 'targetAttribute' => ['mode_id' => 'id']],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png, bmp, webp'],
            [['image'], 'safe'],
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
            'image' => Yii::t('app', 'Image'),
            'file' => Yii::t('app', 'File'),
            'markup' => Yii::t('app', 'Markup'),
            'producer_id' => Yii::t('app', 'Producer ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'mode_id' => Yii::t('app', 'Mode ID'),
            'axis_id' => Yii::t('app', 'Axis ID'),
            'chassis_id' => Yii::t('app', 'Chassis ID'),
        ];
    }

    /**
     * Gets query for [[Markups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkups()
    {
        return $this->hasMany(Markup::className(), ['trailer_id' => 'id']);
    }

    /**
     * Gets query for [[Axis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAxis()
    {
        return $this->hasOne(Axis::className(), ['id' => 'axis_id']);
    }

    /**
     * Gets query for [[Chassis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChassis()
    {
        return $this->hasOne(Chassis::className(), ['id' => 'chassis_id']);
    }

    /**
     * Gets query for [[Mode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMode()
    {
        return $this->hasOne(Mode::className(), ['id' => 'mode_id']);
    }

    /**
     * Gets query for [[Producer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[UserTrailers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTrailers()
    {
        return $this->hasMany(UserTrailer::className(), ['trailer_id' => 'id']);
    }

    public function getTrailerCategories()
    {
        return $this->hasMany(TrailerCategory::className(), ['trailer_id' => 'id']);
    }

    public function beforeValidate()
    {
        $this->image = (new UploadForm($this))->upload() ?: $this->image = $this->getOldAttribute('image');
        return parent::beforeValidate();
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->image ? $this->image = 'uploads/' . $this->image : $this->image = 'images/noImage100x100.png';
    }

    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('trailer_category', ['trailer_id' => 'id']);
    }
}
