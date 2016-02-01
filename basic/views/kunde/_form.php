<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kunde */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kunde-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'debitor_nr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anrede')->textInput() ?>

    <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vorname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nachname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'strasse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hausnr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ort')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'festnetz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handy')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
