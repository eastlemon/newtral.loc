<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "old_category".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $parent_id
 */
class OldCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'old_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'parent_id'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['image'], 'string', 'max' => 1024],
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
            'image' => 'Image',
            'parent_id' => 'Parent ID',
        ];
    }
    
    public function getParent()
    {
        return $this->hasOne(OldCategory::className(), ['id' => 'parent_id']);
    }
}
