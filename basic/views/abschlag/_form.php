<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Abschlag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abschlag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datenblatt_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kaufvertrag_prozent')->textInput() ?>

    <?= $form->field($model, 'kaufvertrag_betrag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kaufvertrag_angefordert')->textInput() ?>

    <?= $form->field($model, 'sonderwunsch_prozent')->textInput() ?>

    <?= $form->field($model, 'sonderwunsch_betrag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sonderwunsch_angefordert')->textInput() ?>

    <?= $form->field($model, 'summe')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
