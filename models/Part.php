<?php

namespace app\models;

use Yii;
use yii\db\Query;

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
 * @property PartCertificate[] $partCertificates
 * @property PartPicture[] $partPictures
 * @property PartSpec[] $partSpecs
 */
class Part extends \yii\db\ActiveRecord
{
    public $picture, $offer, $certificate_ids;

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
            [['certificate_ids'], 'safe'],
            [['slug'], 'unique'],
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

    public function getCertificates()
    {
        return $this->hasMany(Certificate::className(), ['id' => 'certificate_id'])->viaTable('part_certificate', ['part_id' => 'id']);
    }

    public function getStocks()
    {
        return self::find()
        ->andFilterWhere(['=', 'articul', $this->articul]);
    }

    public function getAnalogues()
    {
        return self::find()
        ->orFilterWhere(['like', 'articul', $this->articul])
        ->orFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['<>', 'id', $this->id]);
    }
}
