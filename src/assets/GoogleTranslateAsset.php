<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 24.06.2016
 */
namespace skeeks\cms\googleApi\serviceTranslate\assets;

use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GoogleTranslateAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/googleApi/serviceTranslate/assets/src';
    public $css = [];
    public $js = [];

    public $depends = [];
}