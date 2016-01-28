<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kaeufer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kaeufer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'debitor_nr')->textInput(['maxlength' => true]) ?>

    <? // = $form->field($model, 'beurkundung_am')->textInput() ?>

    <?// = $form->field($model, 'verbindliche_fertigstellung')->textInput() ?>

    <?// =  $form->field($model, 'uebergang_bnl')->textInput() ?>

    <?// =  $form->field($model, 'abnahme_se')->textInput() ?>

    <?// =  $form->field($model, 'abnahme_ge')->textInput() ?>

    <?// =  $form->field($model, 'auflassung')->textInput() ?>

    <?= $form->field($model, 'anrede')->textInput() ?>

    <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nachname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'strasse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hausnr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ort')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'festnetz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?// =  $form->field($model, 'anrede2')->textInput() ?>

    <?// =  $form->field($model, 'titel2')->textInput(['maxlength' => true]) ?>

    <?// =  $form->field($model, 'vorname2')->textInput(['maxlength' => true]) ?>

    <?// =  $form->field($model, 'nachname2')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
