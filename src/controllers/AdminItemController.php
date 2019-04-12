<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 31.05.2015
 */
namespace skeeks\cms\google\translate\controllers;

use skeeks\cms\comments\models\CmsComment;
use skeeks\cms\google\translate\models\GoogleTranslateItem;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use yii\helpers\ArrayHelper;
use yii\helpers\UnsetArrayValue;

/**
 * Class AdminCommentController
 * @package skeeks\cms\comments\controllers
 */
class AdminItemController extends AdminModelEditorController
{
    public function init()
    {
        $this->name                   = \Yii::t('skeeks/google/translate', 'Google Translate');
        $this->modelShowAttribute      = "id";
        $this->modelClassName          = GoogleTranslateItem::class;

        parent::init();

    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [

            'create' => new UnsetArrayValue()

        ]);
    }

}
