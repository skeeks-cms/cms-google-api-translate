<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 31.05.2015
 */

namespace skeeks\cms\googleServiceTranslate\controllers;

use skeeks\cms\googleServiceTranslate\models\GoogleTranslateItem;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use yii\helpers\ArrayHelper;
use yii\helpers\UnsetArrayValue;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminItemController extends AdminModelEditorController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/googleApi/translate', 'Google Translate');
        $this->modelShowAttribute = "id";
        $this->modelClassName = GoogleTranslateItem::class;

        parent::init();

    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [

            'create' => new UnsetArrayValue(),

        ]);
    }

}
