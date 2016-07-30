<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AbschlagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abschlag-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'datenblatt_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'kaufvertrag_prozent') ?>

    <?= $form->field($model, 'kaufvertrag_betrag') ?>

    <?php // echo $form->field($model, 'kaufvertrag_angefordert') ?>

    <?php // echo $form->field($model, 'sonderwunsch_prozent') ?>

    <?php // echo $form->field($model, 'sonderwunsch_betrag') ?>

    <?php // echo $form->field($model, 'sonderwunsch_angefordert') ?>

    <?php // echo $form->field($model, 'summe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
