<?php

namespace app\modules\cms\actions;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use app\modules\cms\models\CmsModel;

class PageAction extends \yii\base\Action
{
    public $layout;

    public $view = '/../modules/cms/views/page';

    public $pageId;

    public $baseTemplateParams = [];

    public $commentWidgetParams = [];

    public function init()
    {
        parent::init();

        if (empty($this->pageId)) {
            $this->pageId = Yii::$app->request->get('pageId');
        }

        if (!empty($this->layout)) {
            $this->controller->layout = $this->layout;
        }
    }

    public function run()
    {
        $model = $this->findModel();
        $model->content = $this->parseBaseTemplateParams($model->content);

        return $this->controller->render($this->view, [
            'model' => $model,
            'commentWidgetParams' => $this->commentWidgetParams,
        ]);
    }

    protected function parseBaseTemplateParams(string $pageContent)
    {
        $params = $this->getBaseTemplateParams();
        $p = [];
        foreach ($params as $name => $value) {
            $p['{' . $name . '}'] = $value;
        }

        return strtr($pageContent, $p);
    }

    protected function getBaseTemplateParams()
    {
        return ArrayHelper::merge($this->baseTemplateParams, [
            'homeUrl' => Yii::$app->urlManager->baseUrl,
            'siteName' => Yii::$app->name,
        ]);
    }

    protected function findModel(): CmsModel
    {
        if (($model = CmsModel::findOne($this->pageId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('yii2mod.cms', 'The requested page does not exist.'));
    }
}
