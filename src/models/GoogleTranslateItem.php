<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 16.08.2016
 */
namespace skeeks\cms\googleApi\serviceTranslate\models;

use skeeks\cms\models\CmsUser;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%google_translate_item}}".
 *
 * @property integer $id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $source_format
 * @property string $source_language
 * @property string $source_phrase
 * @property string $target_language
 * @property string $target_phrase
 * @property string $detected_source_language
 */
class GoogleTranslateItem extends \skeeks\cms\models\Core
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%google_translate_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['source_phrase', 'target_language', 'target_phrase'], 'required'],
            [['source_format'], 'string', 'max' => 4],
            [['source_language', 'target_language', 'detected_source_language'], 'string', 'max' => 5],
            [['source_phrase'], 'string', 'max' => 128],
            [['target_phrase'], 'string', 'max' => 256],
            [['source_phrase', 'source_language', 'source_format', 'target_language'], 'unique', 'targetAttribute' => ['source_phrase', 'source_language', 'source_format', 'target_language'], 'message' => 'The combination of Format, Source language and Source phrase has already been taken.'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \Yii::$app->hasProperty('user') ? \Yii::$app->user->identityClass : CmsUser::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \Yii::$app->hasProperty('user') ? \Yii::$app->user->identityClass : CmsUser::className(), 'targetAttribute' => ['created_by' => 'id']],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Yii::t('skeeks/googleApi/translate', 'ID'),
            'created_by' => Yii::t('skeeks/googleApi/translate', 'Created By'),
            'updated_by' => Yii::t('skeeks/googleApi/translate', 'Updated By'),
            'created_at' => Yii::t('skeeks/googleApi/translate', 'Created At'),
            'updated_at' => Yii::t('skeeks/googleApi/translate', 'Updated At'),
            'source_format' => Yii::t('skeeks/googleApi/translate', 'Format'),
            'source_language' => Yii::t('skeeks/googleApi/translate', 'Source language'),
            'source_phrase' => Yii::t('skeeks/googleApi/translate', 'Source phrase'),
            'target_language' => Yii::t('skeeks/googleApi/translate', 'Target language'),
            'target_phrase' => Yii::t('skeeks/googleApi/translate', 'Translation result'),
            'detected_source_language' => Yii::t('skeeks/googleApi/translate', 'Detected source language'),
        ]);
    }
}