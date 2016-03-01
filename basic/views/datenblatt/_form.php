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
$this->registerJs('
    $(function(){
        $("#datenblatt-form").submit();

        // after reload form
        $(document).on(\'ready pjax:success\', function() {
            new DatenblattForm();
        });
        
//        // To disable f5
//        $(document).bind("keydown", function(e){
//            if ((e.which || e.keyCode) == 116) {
//                e.preventDefault();
//
//                $("#datenblatt-form").attr("action")
//            }
//        });

    });
');
?>

<!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->

<?php //yii\widgets\Pjax::begin(['id' => 'datenblatt-form']) ?>
<?php //$form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    //'validateOnSubmit' => true,
    'options' => array(
        'data-pjax' => true,
        //'class' => 'datenblatt-form',
        'id' => 'datenblatt-form'
    )
]); ?>

<!--<div class="row">-->
<!--    <div class="col-sm-2">-->
        <!-- ?= $form->field($modelDatenblatt, 'nummer')->textInput(['maxlength' => true]) ?-->
<!--    </div>-->
<!--</div>-->

<div class="hide"><?= $form->field($modelDatenblatt, 'aktiv')->hiddenInput() ?></div>

<?php if ($modelDatenblatt->id): ?>
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($modelDatenblatt, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name'), ['prompt' => 'Firma auswählen'])->label('Firma') ?>
        </div>
        <div class="col-sm-2">
            
            <?php 
            $firma = $modelDatenblatt->firma ? $modelDatenblatt->firma : new Firma();
            if($modelDatenblatt->firma) {
                //echo $modelDatenblatt->firma->nr;
            }
            echo $form->field($firma, 'nr')->textInput(['disabled' => 'disabled'])->label('Firmennummer')
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            $htmlOptions = ['prompt' => 'Projekt auswählen'];
            if (!$modelDatenblatt->firma_id) {
                $htmlOptions['disabled'] = 'disabled';
            }
            $projekte = $modelDatenblatt->firma ? $modelDatenblatt->firma->projekts : [];
            echo $form->field($modelDatenblatt, 'projekt_id')->dropDownList(ArrayHelper::map($projekte, 'id', 'name'), $htmlOptions)->label('Projekt');
            ?>
        </div>
        <div class="col-sm-2">
            <?php
            $htmlOptions = ['prompt' => 'Object auswählen'];
            $haeuserOptions = [];
            if (!$modelDatenblatt->projekt_id) {
                $htmlOptions['disabled'] = 'disabled';
            } else {
                /* @var $haus \app\models\Haus */
                $haeuserOptions = [];
                foreach ($modelDatenblatt->projekt->hauses as $haus) {
                    if ($haus->id == $modelDatenblatt->haus_id || count($haus->datenblatts) == 0) {
                        /* @var $te \app\models\Teileigentumseinheit */
                        $teId = '';
                        $teNr = '';
                        //echo 'hid: ' . $haus->id . "<br>";
                        foreach ($haus->teileigentumseinheits as $te) {
                            //echo 'te-id: ' . $te->id . "<br>";
                            if ($te->einheitstyp_id == \app\models\Einheitstyp::TYPE_HAUS) {
                                $haeuserOptions[$haus->id] = ($te->te_nummer ? $te->te_nummer : "Keine TE-Nr (id: $te->id)");
                                break;
                            }
                        }
                    }
                }
            }
            echo $form->field($modelDatenblatt, 'haus_id')->dropDownList($haeuserOptions, $htmlOptions)->label('Teileigentumseinheit');
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

    <?php //if ($modelDatenblatt->kaeufer): ?>
        <?= $this->render('_kaeuferdaten', [
            'form' => $form,
            'modelKaeufer' => $modelKaeufer,
        ]) ?>
    <?php //endif; ?>

    <div class="row">
        <div class="col-sm-10">
            <?= $form->field($modelDatenblatt, 'besondere_regelungen_kaufvertrag')->textarea(['rows' => '5']) ?>
        </div>
    </div>

    <?= $this->render('_sonderwuensche', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt,
    ]) ?>
<div class="form-group" style="text-align: right;">
    <?= Html::submitButton($modelDatenblatt->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
</div>
    <?= $this->render('_kaufpreisabrechnung', [
        'form' => $form,
        'modelDatenblatt' => $modelDatenblatt,
        'kaufpreisTotal' => $kaufpreisTotal,
        'sonderwuenscheTotal' => $sonderwuenscheTotal,
    ]) ?>
<div class="form-group" style="text-align: right;">
    <?= Html::submitButton($modelDatenblatt->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
</div>
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
        <div class="col-sm-8">
            <?= $form->field($modelDatenblatt, 'sonstige_anmerkungen')->textarea(['rows' => '5']) ?>
        </div>
    </div>


<?php endif; ?>

<div class="form-group" style="text-align: right;">
    <?= Html::submitButton($modelDatenblatt->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php //yii\widgets\Pjax::end() ?>
