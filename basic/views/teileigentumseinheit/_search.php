<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TeileigentumseinheitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teileigentumseinheit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'haus_id') ?>

    <?= $form->field($model, 'einheitstyp_id') ?>

    <?= $form->field($model, 'te_nummer') ?>

    <?= $form->field($model, 'gefoerdert') ?>

    <?php // echo $form->field($model, 'geschoss') ?>

    <?php // echo $form->field($model, 'zimmer') ?>

    <?php // echo $form->field($model, 'me_anteil') ?>

    <?php // echo $form->field($model, 'wohnflaeche') ?>

    <?php // echo $form->field($model, 'kaufpreis') ?>

    <?php // echo $form->field($model, 'kp_einheit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
