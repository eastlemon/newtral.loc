<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use skeeks\yii2\slug\SlugBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Part extends ActiveRecord
{
    public $partFirstImage, $file, $offer, $certificate_ids;

    public static function tableName()
    {
        return 'part';
    }

    public function rules()
    {
        return [
            [['name', 'articul', 'producer_id'], 'required'],
            [['name', 'description', 'created_at', 'updated_at'], 'string'],
            [['producer_id', 'original_id'], 'integer'],
            [['slug', 'articul'], 'string', 'max' => 255],
            [['original_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['original_id' => 'id']],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png, bmp, webp'],
            [['offer'], 'number'],
            [['certificate_ids'], 'safe'],
            [['slug'], 'unique'],
        ];
    }
    
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => SlugBehavior::className(),
                'slugAttribute' => 'slug',
                'attribute' => 'name',
                'maxLength' => 64,
                'minLength' => 3,
                'ensureUnique' => true,
                'slugifyOptions' => [
                    'lowercase' => true,
                    'separator' => '-',
                    'trim' => true,
                ]
            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture' => Yii::t('app', 'Picture'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'articul' => Yii::t('app', 'Articul'),
            'description' => Yii::t('app', 'Description'),
            'file' => Yii::t('app', 'File'),
            'producer_id' => Yii::t('app', 'Producer ID'),
            'original_id' => Yii::t('app', 'Original ID'),
            'certificate_ids' => Yii::t('app', 'Certificate IDs'),
            'offer' => Yii::t('app', 'Offer'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorites::className(), ['part_id' => 'id']);
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
     * Gets query for [[Original]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOriginal()
    {
        return $this->hasOne(Part::className(), ['id' => 'original_id']);
    }

    /**
     * Gets query for [[Parts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParts()
    {
        return $this->hasMany(Part::className(), ['original_id' => 'id']);
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

    public function getNodeParts()
    {
        return $this->hasMany(NodePart::className(), ['part_id' => 'id']);
    }

    public function getPartCertificates()
    {
        return $this->hasMany(PartCertificate::className(), ['part_id' => 'id']);
    }

    public function getPartPictures()
    {
        return $this->hasMany(PartPicture::className(), ['part_id' => 'id']);
    }

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
        return self::find()->andFilterWhere(['=', 'articul', $this->articul]);
    }

    /*public function getAnalogues()
    {
        return self::find()
        ->orFilterWhere(['like', 'articul', $this->articul])
        ->orFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['<>', 'id', $this->id]);
    }*/
    public function getAnalogues()
    {
        return self::find()->andFilterWhere(['=', 'original_id', $this->id]);
    }

    public static function getProfit()
    {
        return self::find()->orderBy('RAND()')->limit(4)->all();
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->partPictures[0]->picture ? $this->partFirstImage = '@web/uploads/' . $this->partPictures[0]->picture : $this->partFirstImage = '/images/noImage100x100.png';
    }
}
