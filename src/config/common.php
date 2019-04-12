<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.08.2015
 */
return [

    'components' => [
        'i18n' => [
            'translations' => [
                'skeeks/googleApi/translate' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/googleServiceTranslate/messages',
                    'fileMap'  => [
                        'skeeks/googleApi/translate' => 'main.php',
                    ],
                ],
            ],
        ],

        'googleApi' => [
            'serviceTranslateClass' => [
                'class' => 'skeeks\cms\googleServiceTranslate\GoogleApiServiceTranslate',
            ],
        ],
    ],

    'modules' => [
        'googleTranslate' => [
            'class' => 'skeeks\cms\googleServiceTranslate\GoogleTranslateModule',
        ],
    ],
];