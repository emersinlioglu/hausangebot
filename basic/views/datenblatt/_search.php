<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatenblattSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datenblatt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firma_id') ?>

    <?= $form->field($model, 'projekt_id') ?>

    <?= $form->field($model, 'haus_id') ?>

    <?= $form->field($model, 'nummer') ?>

    <?php // echo $form->field($model, 'kaeufer_id') ?>

    <?php // echo $form->field($model, 'besondere_regelungen_kaufvertrag') ?>

    <?php // echo $form->field($model, 'sonstige_anmerkungen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
