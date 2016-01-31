<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Firma;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $modelDatenblatt \app\models\Datenblatt */
/* @var $form \yii\widgets\ActiveForm */
?>
<?php
//$this->registerJs(
//    '$("document").ready(function(){
//        $("#dynamic-form").on("pjax:end", function() {
//            $.pjax.reload({container:"#datenblatt-form"});  //Reload GridView
//            console.log("reload form");
//        });
//    });'
//);
$this->registerJs(
    '$(function(){
        $("#datenblatt-form").submit();

        // after reload form
        $(document).on(\'ready pjax:success\', function() {
            console.log("new init");
            new DatenblattForm();
        });
    });'
);
?>

<?php yii\widgets\Pjax::begin(['id' => 'datenblatt-form']) ?>
<?php //$form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
    'options' => array(
        'data-pjax' => true,
//            'class' => 'datenblatt-form',
        'id' => 'datenblatt-form'
    )
]); ?>

<div class="row">
    <div class="col-sm-2">
        <?= $form->field($modelDatenblatt, 'nummer')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<?php if ($modelDatenblatt->id): ?>
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($modelDatenblatt, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name'), ['prompt' => 'Firma auswählen']) ?>
        </div>
        <div class="col-sm-2">
            <?php
            $htmlOptions = ['prompt' => 'Projekt auswählen'];
            if (!$modelDatenblatt->firma_id) {
                $htmlOptions['disabled'] = 'disabled';
            }
            $projekte = $modelDatenblatt->firma ? $modelDatenblatt->firma->projekts : [];
            echo $form->field($modelDatenblatt, 'projekt_id')->dropDownList(ArrayHelper::map($projekte, 'id', 'name'), $htmlOptions);
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            $htmlOptions = ['prompt' => 'Haus auswählen'];
            $haeuser = $modelDatenblatt->firma && $modelDatenblatt->projekt ? $modelDatenblatt->projekt->hauses : [];
            $haeuserOptions = ArrayHelper::map($haeuser, 'id', 'id');
            if (!$modelDatenblatt->projekt_id) {
                $htmlOptions['disabled'] = 'disabled';
            }
            echo $form->field($modelDatenblatt, 'haus_id')->dropDownList($haeuserOptions, $htmlOptions);
            ?>
        </div>
    </div>

    <?= $this->render('_hausdetails', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt,
    ]) ?>

    <?= $this->render('_teileigentumseinheiten', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt,
    ]) ?>

    <?= $this->render('_zaehlerangaben', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt
    ]) ?>

    <?php if ($modelDatenblatt->kaeufer): ?>
        <?= $this->render('_kaeuferdaten', [
            'form' => $form,
            'modelKaeufer' => $modelDatenblatt->kaeufer,
        ]) ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-10">
            <?= $form->field($modelDatenblatt, 'besondere_regelungen_kaufvertrag')->textarea(['rows' => '5']) ?>
        </div>
    </div>

    <?= $this->render('_sonderwuensche', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt,
    ]) ?>

    <?= $this->render('_kaufpreisabrechnung', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt,
    ]) ?>

    <div class="row">
        <div class="col-md-12">

            <?= $this->render('_nachlass', [
                'form' => $form,
                'modelDatenblatt' => $modelDatenblatt,
            ]) ?>

            <?= $this->render('_zahlung', [
                'form' => $form,
                'modelDatenblatt' => $modelDatenblatt,
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <?= $form->field($modelDatenblatt, 'sonstige_anmerkungen')->textarea(['rows' => '5']) ?>
        </div>
    </div>


<?php endif; ?>

<div class="form-group" style="text-align: right;">
    <?= Html::submitButton($modelDatenblatt->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
