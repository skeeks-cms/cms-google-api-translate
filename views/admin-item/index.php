<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 23.06.2016
 */

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\Game */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<? $pjax = \skeeks\cms\modules\admin\widgets\Pjax::begin(); ?>

    <?php /*echo $this->render('_search', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider
    ]); */?>

    <?= \skeeks\cms\modules\admin\widgets\GridViewStandart::widget([
        'dataProvider'  => $dataProvider,
        'filterModel'   => $searchModel,
        'adminController'   => $controller,
        'pjax'              => $pjax,
        'columns' =>
            [
                'source_phrase',
                'target_language',
                'target_phrase',

                'source_format',
                'source_language',

                'detected_source_language',
            ]
    ]); ?>

<? $pjax::end(); ?>
