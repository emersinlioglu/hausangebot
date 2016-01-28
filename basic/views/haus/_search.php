<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HausSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="haus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'projekt_id') ?>

    <?= $form->field($model, 'plz') ?>

    <?= $form->field($model, 'ort') ?>

    <?= $form->field($model, 'strasse') ?>

    <?php // echo $form->field($model, 'hausnr') ?>

    <?php // echo $form->field($model, 'reserviert') ?>

    <?php // echo $form->field($model, 'verkauft') ?>

    <?php // echo $form->field($model, 'rechnung_vertrieb') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
