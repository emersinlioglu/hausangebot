<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Projekt;
use app\models\Firma;
use app\models\Einheitstyp;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\Haus */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="haus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-sm-3">
            <?= $form->field($model, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'projekt_id')->dropDownList(ArrayHelper::map(Projekt::find()->all(), 'id', 'name')) ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'strasse')->textInput([]) ?>
            <?= $form->field($model, 'plz')->textInput([]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'hausnr')->textInput([]) ?>
            <?= $form->field($model, 'ort')->textInput([]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'reserviert')->checkbox([]) ?>
            <?= $form->field($model, 'verkauft')->checkbox([]) ?>
            <?= $form->field($model, 'rechnung_vertrieb')->checkbox([]) ?>
        </div>
    </div>
    
    <h2>Teileigentumseinheiten</h2>
    <?php if (!$model->isNewRecord): ?>
        <?= Html::submitButton('<span class="fa fa-plus"> Teileigentumseinheit hinzufügen</span>', ['class' => 'btn btn-success', 'name' => 'addnew']) ?>
    <?php endif; ?>

    <table class="table no-label">
        <tr>
            <th>Typ</th>
            <th>TE-Nummer</th>
            <th>gefördert</th>
            <th>geschoss</th>
            <th>zimmer</th>
            <th>ME-Anteil</th>
            <th>Wohnfläche</th>
            <th>Kaufpreis</th>
            <th>KP-Einheit</th>
        </tr>
    <?php foreach($model->teileigentumseinheits as $key => $modelTeilieigentum): ?>
        <tr>
            <td>
                <span class="hide">
                    <?= $form->field($modelTeilieigentum, 'id')
                        ->hiddenInput(['name' => "Teileigentumseinheiten[$key][id]"]) ?>
                    <?= $form->field($modelTeilieigentum, 'haus_id')
                        ->hiddenInput(['name' => "Teileigentumseinheiten[$key][haus_id]"]) ?>
                </span>
                <?= $form->field($modelTeilieigentum, 'einheitstyp_id')
                    ->dropDownList(ArrayHelper::map(Einheitstyp::find()->all(), 'id', 'name'), 
                            ['name' => "Teileigentumseinheiten[$key][einheitstyp_id]"]) ?>
            </td>
            <td><?= $form->field($modelTeilieigentum, 'te_nummer')->textInput(["maxlength" => true, 'name' => "Teileigentumseinheiten[$key][te_nummer]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'gefoerdert')->dropDownList([1 => 'Ja', 0 => 'Nein'], ['name' => "Teileigentumseinheiten[$key][gefoerdert]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'geschoss')->textInput(["maxlength" => true, 'name' => "Teileigentumseinheiten[$key][geschoss]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'zimmer')->textInput(["maxlength" => true, 'name' => "Teileigentumseinheiten[$key][zimmer]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'me_anteil')->textInput(["maxlength" => true, 'name' => "Teileigentumseinheiten[$key][me_anteil]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'wohnflaeche')->textInput(["maxlength" => true, 'name' => "Teileigentumseinheiten[$key][wohnflaeche]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'kaufpreis')->textInput(['name' => "Teileigentumseinheiten[$key][kaufpreis]"]) ?></td>
            <td><?= $form->field($modelTeilieigentum, 'kp_einheit')->textInput(['name' => "Teileigentumseinheiten[$key][kp_einheit]"]) ?></td>
            <td>
                <label>&nbsp;</label>
                <?= Html::a('<span class="fa fa-minus"></span>', 
                    Yii::$app->urlManager->createUrl(["haus/deleteteileigentumseinheit", 'hausId' => $model->id , 'teileigentumseinheitId' => $modelTeilieigentum->id]), 
                    ['class' => 'add-zahlung btn btn-danger btn-xl']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>


    <h2>Zählerstand-Angaben:</h2>
    
    <?php if (!$model->isNewRecord): ?>
        <?= Html::submitButton('<span class="fa fa-plus"> Zählerstand hinzufügen</span>', ['class' => 'btn btn-success', 'name' => 'addnewZaehlerstand']) ?>
    <?php endif; ?>
    
    <table class="table no-label">
        <tr>
            <th>Medium-Nr.</th>
            <th>Zählerstand</th>
            <th>Datum</th>
            <th>Aktion</th>
        </tr>
        <?php 
        /* @var $zaehlerstand app\models\Zaehlerstand */
        foreach ($model->zaehlerstands as $key => $zaehlerstand): ?>
            <tr>
                <td>
                    <span class="hide">
                        <?= $form->field($zaehlerstand, 'id')->hiddenInput(['name' => "Zaehlerstaende[$key][id]"]) ?>
                    </span>
                    <?= $form->field($zaehlerstand, 'name')->textInput(['name' => "Zaehlerstaende[$key][name]"]) ?>
                </td>
                <td><?= $form->field($zaehlerstand, 'stand')->textInput(['name' => "Zaehlerstaende[$key][stand]"]) ?></td>
                <td>
                    <?php 
                        echo '<label>Datum</label>';
                        echo $form->field($zaehlerstand, "[$key]datum")->widget(DateControl::classname(), [
                            'type' => DateControl::FORMAT_DATE,
                            'options' => [
                                'pluginOptions' => [
                                    'removeButton' => false,
                                    'autoclose' => true
                                ]
                            ]
                        ]);
                    ?>
                </td>
                <td>
                    <label>&nbsp;</label>
                    <?= Html::a('<span class="fa fa-minus"></span>', 
                    Yii::$app->urlManager->createUrl(["haus/deletezaehlerstand", 'hausId' => $model->id , 'zaehlerstandId' => $zaehlerstand->id]), 
                    ['class' => 'add-zahlung btn btn-danger btn-xl']) ?>
                </td>
            </tr>
        <?php 
        endforeach; 
        ?>
    </table>
    
    
    <div class="form-group" style="text-align: right;">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

