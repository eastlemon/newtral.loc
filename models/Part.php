<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $articul
 * @property string|null $description
 * @property int $producer_id
 *
 * @property NodePart[] $nodeParts
 * @property Offer[] $offers
 * @property Producer $producer
 * @property PartAnalogue[] $partAnalogues
 * @property PartAnalogue[] $partAnalogues0
 * @property PartCertificate[] $partCertificates
 * @property PartPicture[] $partPictures
 * @property PartSpec[] $partSpecs
 */
class Part extends \yii\db\ActiveRecord
{
    public $picture, $offer;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'part';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'articul', 'producer_id'], 'required'],
            [['description'], 'string'],
            [['producer_id'], 'integer'],
            [['name', 'slug', 'articul'], 'string', 'max' => 255],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['picture'], 'file'],
            [['offer'], 'number'],
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
            'articul' => Yii::t('app', 'Articul'),
            'description' => Yii::t('app', 'Description'),
            'producer_id' => Yii::t('app', 'Producer ID'),
        ];
    }

    /**
     * Gets query for [[NodeParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodeParts()
    {
        return $this->hasMany(NodePart::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[Offers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['part_id' => 'id']);
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
     * Gets query for [[PartAnalogues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartAnalogues()
    {
        return $this->hasMany(PartAnalogue::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[PartAnalogues0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartAnalogues0()
    {
        return $this->hasMany(PartAnalogue::className(), ['part_id_analogue' => 'id']);
    }

    /**
     * Gets query for [[PartCertificates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartCertificates()
    {
        return $this->hasMany(PartCertificate::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[PartPictures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartPictures()
    {
        return $this->hasMany(PartPicture::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[PartSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartSpecs()
    {
        return $this->hasMany(PartSpec::className(), ['part_id' => 'id']);
    }
}
