<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Datenblatt */
/* @var $form yii\widgets\ActiveForm */


use yii\helpers\ArrayHelper;
use app\models\Firma;
use yii\widgets\Pjax;
?>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#dynamic-form").on("pjax:end", function() {
            $.pjax.reload({container:"#datenblatt-form"});  //Reload GridView
        });
    });'
);
?>

<?php yii\widgets\Pjax::begin(['id' => 'dynamic-form']) ?>
<?php //$form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

<div class="datenblatt-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 
        'options'=>array(
            'data-pjax' => true, 
            'class' => 'datenblatt-form'
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
            <?= $form->field($modelDatenblatt, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name'), ['prompt'=>'Firma auswählen']) ?>
        </div>
        <div class="col-sm-2">
            <?php
                $projekte = $modelDatenblatt->firma ? $modelDatenblatt->firma->projekts : [];
                echo $form->field($modelDatenblatt, 'projekt_id')->dropDownList(ArrayHelper::map($projekte, 'id', 'name'), ['prompt'=>'Projekt auswählen']);
            ?>
        </div>
        <div class="col-sm-2">
            <?php   
                $haeuser = $modelDatenblatt->firma && $modelDatenblatt->projekt ? $modelDatenblatt->projekt->hauses : [];
                echo $form->field($modelDatenblatt, 'haus_id')->dropDownList(ArrayHelper::map($haeuser, 'id', 'id'), ['prompt'=>'Haus auswählen']);
            ?>
        </div>
    </div>
    
    <div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-hausdetails" aria-expanded="true" class="">
                    Hause Details:
                </a>
            </h4>
        </div>
        <div id="collapse-hausdetails" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-3">
                        Anschrift:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Straße + Hausnummer: 
                    </div>
                    <div class="col-sm-3">
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->strasse : '' ?>
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->hausnr : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        PLZ/Ort: 
                    </div>
                    <div class="col-sm-3">
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->plz : '' ?>
                        <?= $modelDatenblatt->haus ? $modelDatenblatt->haus->ort : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        reserviert: 
                    </div>
                    <div class="col-sm-1">
                        <?= $modelDatenblatt->haus ? ($modelDatenblatt->haus->reserviert ? 'ja' : 'nein') : '' ?><br>
                    </div>
                    <div class="col-sm-1">
                        verkauft:
                    </div>
                    <div class="col-sm-1">
                        <?= $modelDatenblatt->haus ? ($modelDatenblatt->haus->verkauft ? 'ja' : 'nein') : '' ?>
                    </div>
                    <div class="col-sm-2">
                        Rechnung/Vertrieb:
                    </div>
                    <div class="col-sm-1">
                        <?= $modelDatenblatt->haus ? ($modelDatenblatt->haus->rechnung_vertrieb ? 'ja' : 'nein') : '' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?= $this->render('_teileigentumseinheiten', [
            'form' => $form,
            'modelDatenblatt'  => $modelDatenblatt,
        ]) ?>
    
    <?= $this->render('_zaehlerangaben', [
            'form' => $form,
            'modelDatenblatt'  => $modelDatenblatt,
        ]) ?>
    
    <?php if($modelDatenblatt->kaeufer): ?>
    <?= $this->render('_kaeuferdaten', [
            'form' => $form,
            'modelKaeufer'  => $modelDatenblatt->kaeufer,
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
</div>