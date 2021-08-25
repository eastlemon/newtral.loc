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
 * @property Producer $producer
 * @property PartCertificate[] $partCertificates
 * @property PartOffer[] $partOffers
 * @property PartPicture[] $partPictures
 * @property PartSpec[] $partSpecs
 */
class Part extends \yii\db\ActiveRecord
{
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
     * Gets query for [[Producer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
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
     * Gets query for [[PartOffers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartOffers()
    {
        return $this->hasMany(PartOffer::className(), ['part_id' => 'id']);
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
