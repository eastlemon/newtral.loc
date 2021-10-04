<?php

namespace app\modules\cms\models;

use cebe\markdown\GithubMarkdown;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\modules\cms\models\enumerables\CmsStatus;
use yii2mod\enum\helpers\BooleanEnum;

class CmsModel extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%cms}}';
    }

    public function rules(): array
    {
        return [
            [['title', 'content', 'markdown_content', 'url', 'meta_title', 'meta_description', 'meta_keywords'], 'trim'],
            [['title', 'content', 'url', 'meta_title'], 'required'],
            ['markdown_content', 'required', 'when' => function () {
                return Yii::$app->getModule('cms')->enableMarkdown;
            }],
            ['url', 'match', 'pattern' => '/^[a-z0-9\/-]+$/'],
            ['url', 'unique'],
            [['content', 'markdown_content', 'meta_title', 'meta_description', 'meta_keywords'], 'string'],
            ['status', 'default', 'value' => CmsStatus::ENABLED],
            ['status', 'in', 'range' => CmsStatus::getConstantsByName()],
            ['comment_available', 'boolean'],
            ['comment_available', 'default', 'value' => BooleanEnum::NO],
            [['title', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('yii2mod.cms', 'ID'),
            'url' => Yii::t('yii2mod.cms', 'Url'),
            'title' => Yii::t('yii2mod.cms', 'Title'),
            'content' => Yii::t('yii2mod.cms', 'Content'),
            'markdown_content' => Yii::t('yii2mod.cms', 'Markdown Content'),
            'status' => Yii::t('yii2mod.cms', 'Status'),
            'meta_title' => Yii::t('yii2mod.cms', 'Meta Title'),
            'meta_description' => Yii::t('yii2mod.cms', 'Meta Description'),
            'meta_keywords' => Yii::t('yii2mod.cms', 'Meta Keywords'),
            'comment_available' => Yii::t('yii2mod.cms', 'Comments'),
            'created_at' => Yii::t('yii2mod.cms', 'Date Created'),
            'updated_at' => Yii::t('yii2mod.cms', 'Date Updated'),
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public static function find(): CmsQuery
    {
        return new CmsQuery(get_called_class());
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeDelete()) {
            if (Yii::$app->getModule('cms')->enableMarkdown) {
                $this->content = (new GithubMarkdown())->parse($this->markdown_content);
            }

            return true;
        } else {
            return false;
        }
    }

    public static function findPage(string $url)
    {
        return self::find()->byUrl($url)->enabled()->one();
    }

    public function getContent(): string
    {
        $content = preg_replace_callback('/\[\[([^(\[\[)]+:[^(\[\[)]+)\]\]/is', [$this, 'replace'], $this->content);

        return $content;
    }

    private function replace(array $data): string
    {
        $widget = explode(':', $data[1]);
        if (class_exists($class = $widget[0]) && method_exists($class, $method = $widget[1])) {
            return call_user_func([$class, $method]);
        }

        return '';
    }
}
