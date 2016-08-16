<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 24.06.2016
 */
namespace skeeks\cms\google\translate\assets;

use yii\web\AssetBundle;

class GoogleTranslateAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/google/translate/assets/source';
    public $css = [];
    public $js = [];

    public $depends = [];
}