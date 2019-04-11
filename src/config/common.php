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
                'skeeks/google/translate' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/google/translate/messages',
                    'fileMap'  => [
                        'skeeks/google/translate' => 'main.php',
                    ],
                ],
            ],
        ],

        'googleTranslate' => [
            'class' => 'skeeks\cms\google\translate\GoogleTranslateComponent',
        ],
    ],

    'modules' => [
        'googleTranslate' => [
            'class' => 'skeeks\cms\google\translate\GoogleTranslateModule',
        ],
    ],
];