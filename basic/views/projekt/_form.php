<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Firma;

/* @var $this yii\web\View */
/* @var $model app\models\Projekt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projekt-form">

    <?php $form = ActiveForm::begin(); ?>

   

      <?= $form->field($model, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name'))->label('Firma') ?>
 <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
