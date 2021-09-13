<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\UploadForm;

class Part extends ActiveRecord
{
    public $picture, $offer, $certificate_ids;

    public static function tableName()
    {
        return 'part';
    }

    public function rules()
    {
        return [
            [['name', 'slug', 'articul', 'producer_id'], 'required'],
            [['name', 'description'], 'string'],
            [['producer_id'], 'integer'],
            [['slug', 'articul'], 'string', 'max' => 255],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['picture'], 'file'],
            [['offer'], 'number'],
            [['certificate_ids'], 'safe'],
            [['slug'], 'unique'],
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'slug',
                ],
                'ensureUnique' => true,
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'articul' => Yii::t('app', 'Articul'),
            'description' => Yii::t('app', 'Description'),
            'picture' => Yii::t('app', 'Picture'),
            'producer_id' => Yii::t('app', 'Producer ID'),
            'certificate_ids' => Yii::t('app', 'Certificate IDs'),
            'offer' => Yii::t('app', 'Offer'),
        ];
    }

    public function getNodeParts()
    {
        return $this->hasMany(NodePart::className(), ['part_id' => 'id']);
    }

    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['part_id' => 'id']);
    }

    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
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

    public function getAnalogues()
    {
        return self::find()
        ->orFilterWhere(['like', 'articul', $this->articul])
        ->orFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['<>', 'id', $this->id]);
    }

    public static function getProfit()
    {
        return self::find()->orderBy('RAND()')->limit(4)->all();
    }

    public function beforeSave($insert)
    {
        $this->picture = (new UploadForm(UploadedFile::getInstance($this, 'picture')))->upload() ?: $this->picture = $this->getOldAttribute('picture');
        return parent::beforeSave($insert);
    }
}
