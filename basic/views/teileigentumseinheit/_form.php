<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teileigentumseinheit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teileigentumseinheit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'haus_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'einheitstyp_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'te_nummer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gefoerdert')->textInput() ?>

    <?= $form->field($model, 'geschoss')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zimmer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'me_anteil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wohnflaeche')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kaufpreis')->textInput() ?>

    <?= $form->field($model, 'kp_einheit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
