<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 16.08.2016
 */

namespace skeeks\cms\google\translate;

use skeeks\cms\google\translate\models\GoogleTranslateItem;
use yii\base\Exception;
use yii\base\InvalidArgumentException;

/**
 * Class GoogleTranslateComponent
 *
 * @package skeeks\cms\google\translate
 */
class GoogleApi extends \skeeks\yii2\googleApi\GoogleApiComponent
{
    /**
     * @var bool Можно использовать кэш в базе данных
     */
    public $isUseDbCache = true;

    /**
     * Returns text translations from one language to another.
     * (translations.listTranslations)
     *
     * @param string $source_phrase The text to translate
     * @param string $target_language The target language into which the text should be translated
     * @param string $source_language auto
     * @param string $format text or html
     * @return string|boolean
     */
    public function translate($source_phrase, $target_language, $source_language = null, $source_format = 'text')
    {
        $source_phrase = trim($source_phrase);
        $source_format = $source_format == 'html' ? 'html' : 'text';

        try {
            if (!$source_phrase) {
                throw new InvalidArgumentException("$source_phrase — is empty!");
            }

            if ($this->isUseDbCache) {
                /**
                 * @var $googleTranslateItem GoogleTranslateItem
                 */
                $query = GoogleTranslateItem::find()
                    ->where(['source_phrase' => $source_phrase])
                    ->andWhere(['target_language' => $target_language])
                    ->andWhere(['source_format' => $source_format]);

                if ($source_language) {
                    $query->andWhere(['source_language' => $source_language]);
                } else {
                    $query->andWhere(['source_language' => null]);
                }

                $googleTranslateItem = $query->one();

                //Такой перевод уже есть в нашей базе вернем сохраненный ранее результат
                if ($googleTranslateItem) {
                    return $googleTranslateItem->target_phrase;
                }
            }

            //Обратимся к google сервису
            $service = \Yii::$app->googleApi->serviceTranslate;

            $optParams = [];
            if ($source_format !== 'text') {
                $optParams['format'] = 'html';
            }

            if ($source_language) {
                $optParams['source'] = $source_language;
            }

            $result = $service->translations->listTranslations($source_phrase, $target_language, $optParams);

            $data = $result->offsetGet('data');
            if (isset($data['translations'][0]['translatedText'])) {
                $translated = $data['translations'][0]['translatedText'];

                //Сохранение результата в базу
                if ($this->isUseDbCache) {
                    $googleTranslateItem = new GoogleTranslateItem();
                    $googleTranslateItem->source_format = $source_format;
                    $googleTranslateItem->source_phrase = $source_phrase;
                    $googleTranslateItem->target_language = $target_language;
                    $googleTranslateItem->target_phrase = $translated;

                    if ($source_language) {
                        $googleTranslateItem->source_language = $source_language;
                    }

                    if (isset($data['translations'][0]['detectedSourceLanguage'])) {
                        $googleTranslateItem->detected_source_language = $data['translations'][0]['detectedSourceLanguage'];
                    }

                    if (!$googleTranslateItem->save()) {
                        \Yii::warning("Перевод не сохранен в базу: ".print_r($googleTranslateItem->errors), self::class);
                    }
                }

                return (string)$translated;
            } else {
                throw new Exception("Not translated '{$source_phrase}' to '{$target_language}'");
            }
        } catch (\Exception $e) {
            \Yii::warning($e->getMessage(), self::class);
            throw $e;
        }

    }
}
