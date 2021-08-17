<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog_part".
 *
 * @property int $id
 * @property string $name
 * @property string $article
 * @property string $factory_article
 * @property string|null $note
 * @property string|null $photo
 * @property int $is_original
 * @property string|null $drawing
 * @property int $manufacturer_id
 * @property string|null $scheme_position
 * @property int|null $original_id
 * @property string|null $coords
 * @property string|null $synonyms
 *
 * @property CatalogNodeParts[] $catalogNodeParts
 * @property CatalogNode[] $nodes
 * @property DictionaryPartmanufacturer $manufacturer
 * @property CatalogPart $original
 * @property CatalogPart[] $catalogParts
 * @property CatalogPartNode[] $catalogPartNodes
 * @property CatalogNode[] $nodes0
 * @property CatalogPartUnit[] $catalogPartUnits
 * @property CatalogUnit[] $units
 * @property LogisticWarehouseinventory[] $logisticWarehouseinventories
 */
class CatalogPart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_part';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'article', 'factory_article', 'is_original', 'manufacturer_id'], 'required'],
            [['note'], 'string'],
            [['is_original', 'manufacturer_id', 'original_id'], 'integer'],
            [['name', 'synonyms'], 'string', 'max' => 256],
            [['article', 'factory_article'], 'string', 'max' => 128],
            [['photo', 'drawing'], 'string', 'max' => 100],
            [['scheme_position', 'coords'], 'string', 'max' => 64],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => DictionaryPartmanufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['original_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogPart::className(), 'targetAttribute' => ['original_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'article' => 'Article',
            'factory_article' => 'Factory Article',
            'note' => 'Note',
            'photo' => 'Photo',
            'is_original' => 'Is Original',
            'drawing' => 'Drawing',
            'manufacturer_id' => 'Manufacturer ID',
            'scheme_position' => 'Scheme Position',
            'original_id' => 'Original ID',
            'coords' => 'Coords',
            'synonyms' => 'Synonyms',
        ];
    }
    
    public static function findModel($id)
    {
        if (($model = static::findOne($id)) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException(Yii::t('app', 'The requested page {name} does not exist.', [
            'name' => 'DicPrtManf'
        ]));
    }

    /**
     * Gets query for [[CatalogNodeParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogNodeParts()
    {
        return $this->hasMany(CatalogNodeParts::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[Nodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(CatalogNode::className(), ['id' => 'node_id'])->viaTable('catalog_node_parts', ['part_id' => 'id']);
    }

    /**
     * Gets query for [[Manufacturer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(DictionaryPartmanufacturer::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * Gets query for [[Original]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOriginal()
    {
        return $this->hasOne(CatalogPart::className(), ['id' => 'original_id']);
    }

    /**
     * Gets query for [[CatalogParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogParts()
    {
        return $this->hasMany(CatalogPart::className(), ['original_id' => 'id']);
    }

    /**
     * Gets query for [[CatalogPartNodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogPartNodes()
    {
        return $this->hasMany(CatalogPartNode::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[Nodes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodes0()
    {
        return $this->hasMany(CatalogNode::className(), ['id' => 'node_id'])->viaTable('catalog_part_node', ['part_id' => 'id']);
    }

    /**
     * Gets query for [[CatalogPartUnits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogPartUnits()
    {
        return $this->hasMany(CatalogPartUnit::className(), ['part_id' => 'id']);
    }

    /**
     * Gets query for [[Units]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(CatalogUnit::className(), ['id' => 'unit_id'])->viaTable('catalog_part_unit', ['part_id' => 'id']);
    }

    /**
     * Gets query for [[LogisticWarehouseinventories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogisticWarehouseinventories()
    {
        return $this->hasMany(LogisticWarehouseinventory::className(), ['part_id' => 'id']);
    }
}
