<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 26.06.2016
 */
return [
    'other' =>
    [
        'items' =>
        [
            'googleTranslate' =>
            [
                'label' => \Yii::t('skeeks/google/translate', 'Google Translate'),
                "img"       => ['skeeks\cms\google\translate\assets\GoogleTranslateAsset', 'images/google-translate.png'],
                'priority'  => 250,

                'items' =>
                [
                    [
                        'priority'  => 0,
                        'label' => \Yii::t('skeeks/google/translate', 'Google Translate'),
                        "url"       => ["googleTranslate/admin-item"],
                        "img"       => ['skeeks\cms\google\translate\assets\GoogleTranslateAsset', 'images/google-translate.png'],
                    ],
                ]
            ]
        ]
    ]
];
