<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zahlung */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zahlung-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datenblatt_id')->textInput() ?>

    <?= $form->field($model, 'datum')->textInput() ?>

    <?= $form->field($model, 'betrag')->textInput() ?>

    <?= $form->field($model, 'bemerkung')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
