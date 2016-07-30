<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaeuferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kaeufer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'debitor_nr') ?>

    <?= $form->field($model, 'beurkundung_am') ?>

    <?= $form->field($model, 'verbindliche_fertigstellung') ?>

    <?= $form->field($model, 'uebergang_bnl') ?>

    <?php // echo $form->field($model, 'abnahme_se') ?>

    <?php // echo $form->field($model, 'abnahme_ge') ?>

    <?php // echo $form->field($model, 'auflassung') ?>

    <?php // echo $form->field($model, 'anrede') ?>

    <?php // echo $form->field($model, 'titel') ?>

    <?php // echo $form->field($model, 'vorname') ?>

    <?php // echo $form->field($model, 'nachname') ?>

    <?php // echo $form->field($model, 'strasse') ?>

    <?php // echo $form->field($model, 'hausnr') ?>

    <?php // echo $form->field($model, 'plz') ?>

    <?php // echo $form->field($model, 'ort') ?>

    <?php // echo $form->field($model, 'festnetz') ?>

    <?php // echo $form->field($model, 'handy') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'anrede2') ?>

    <?php // echo $form->field($model, 'titel2') ?>

    <?php // echo $form->field($model, 'vorname2') ?>

    <?php // echo $form->field($model, 'nachname2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
