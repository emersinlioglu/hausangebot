<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Projekt;
use app\models\Firma;
use app\models\Einheitstyp;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
/* @var $this yii\web\View */
/* @var $model app\models\Haus */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs('
    $(function(){
//        $(".haus-form form").submit();

        new HausForm();

        // after reload form
//        $(document).on(\'ready pjax:success\', function() {
//            new DatenblattForm();
//        });

    });'
);
?>


<div class="haus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-sm-3">
			<?= $form->field($model, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name'), ['prompt' => 'Firma auswählen',

            ])->label('Firma') ?>
           <!--?= $form->field($model, 'firma_id')->dropDownList(ArrayHelper::map(Firma::find()->all(), 'id', 'name')) ?-->
        </div>
        <div class="col-sm-3">
            <!--?= $form->field($model, 'projekt_id')->dropDownList(ArrayHelper::map(Projekt::find()->all(), 'id', 'name')) ?-->
            <?php
            $htmlOptions = ['prompt' => 'Projekt auswählen'];
            //if (!$model->firma_id) {
            //    $htmlOptions['disabled'] = 'disabled';
            //}
            $projekte = $model->firma ? $model->firma->projekts : [];
            echo $form->field($model, 'projekt_id')->dropDownList(ArrayHelper::map($projekte, 'id', 'name'), $htmlOptions)->label('Projekt');
            ?>
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
    
    
    <div class="container teileigentumseinheiten" id='teileigentumseinheiten-id'>
        <h2>Teileigentumseinheiten</h2>

        <table class="table no-label">
            <tr>
                <th style="width: 15%;">Typ</th>
                <th style="width: 10%;">TE-Nummer</th>
                <th style="width: 10%;">gefördert</th>
                <th style="width: 5%;">geschoss</th>
                <th style="width: 5%;">zimmer</th>
                <th style="width: 10%;">ME-Anteil</th>
                <th style="width: 10%;">Wohnfläche</th>
                <th style="width: 15%;">Kaufpreis</th>
                <th style="width: 15%;">KP-Einheit</th>
                <th>
                    <?php if (!$model->isNewRecord): ?>
                        <!--?= Html::submitButton('<span class="fa fa-plus"> Teileigentumseinheit hinzufügen</span>', ['class' => 'btn btn-success', 'name' => 'addnew']) ?-->
                        <?= Html::a('<span class="fa fa-plus"> </span>',
                           Yii::$app->urlManager->createUrl(["haus/addteileigentumseinheit", 'hausId' => $model->id]), 
                           ['class' => 'add-button add-teileigentumseinheit btn btn-success btn-xl']) ?>
                    <?php endif; ?>
                </th>
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
                <td><?=
                    $form->field($modelTeilieigentum, 'kaufpreis')
//                        ->textInput(['name' => "Teileigentumseinheiten[$key][kaufpreis]"])
                        ->widget(MaskMoney::classname(), [
                            'options' => [
                                'id' => $key . '-kaufpreis-id',
                                'name' => "Teileigentumseinheiten[$key][kaufpreis]",
                            ],
//                            'pluginOptions' => [
//                                'suffix' => ' €',
//                                'thousands' => ',',
//                                'decimal' => '.',
//                            ],
                        ])
                ?>
                </td>
                <td><?=

                    $form->field($modelTeilieigentum, 'kp_einheit')
//                        ->textInput([
//                            'name' => "Teileigentumseinheiten[$key][kp_einheit]",
//                            'disabled' => 'disabled'
//                        ])
                        ->widget(MaskMoney::classname(), [
                            'options' => [
                                'id' => $key . '-zhb-id',
                                'disabled' => 'disabled',
                                'name' => "Teileigentumseinheiten[$key][kp_einheit]",
                            ],
                            'pluginOptions' => [
//                                'suffix' => ' €',
//                                'thousands' => ',',
//                                'decimal' => '.',
                            ],
                        ])
                
                ?>
                </td>
                <td>
                    <?= Html::a('<span class="fa fa-minus"></span>', 
                        Yii::$app->urlManager->createUrl(["haus/deleteteileigentumseinheit", 'hausId' => $model->id , 'teileigentumseinheitId' => $modelTeilieigentum->id]), 
                        ['class' => 'delete-button btn btn-danger btn-xl']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>

    <div class="container zaehlerstand" id='zaehlerstand-id'>
        <h2>Zählerstand-Angaben:</h2>

        <table class="table no-label">
            <tr>
                <th style="width: 30%;">Medium-Name.</th>
                <th style="width: 30%;">Medium-Nr.</th>
                <th style="width: 20%;">Zählerstand</th>
                <th style="width: 20%;">Datum</th>
                <th>
                    <?php if (!$model->isNewRecord): ?>
                        <!--?= Html::submitButton('<span class="fa fa-plus"> Teileigentumseinheit hinzufügen</span>', ['class' => 'btn btn-success', 'name' => 'addnew']) ?-->
                        <?= Html::a('<span class="fa fa-plus"> </span>',
                           Yii::$app->urlManager->createUrl(["haus/addzaehlerstand", 'hausId' => $model->id]), 
                           ['class' => 'add-button add-zaehlerstand btn btn-success btn-xl']) ?>
                    <?php endif; ?>
                </th>
            </tr>
            <?php 
            /* @var $zaehlerstand app\models\Zaehlerstand */
            foreach ($model->zaehlerstands as $key => $zaehlerstand): ?>
                <tr>
                    <td>
                        <span class="hide">
                            <?= $form->field($zaehlerstand, 'id')->hiddenInput(['name' => "Zaehlerstand[$key][id]"]) ?>
                        </span>
                        <?= $form->field($zaehlerstand, 'name')->textInput(['name' => "Zaehlerstand[$key][name]"]) ?>
                    </td>
                    <td><?= $form->field($zaehlerstand, 'nummer')->textInput(['name' => "Zaehlerstand[$key][nummer]"]) ?></td>
                    <td><?= $form->field($zaehlerstand, 'stand')->textInput(['name' => "Zaehlerstand[$key][stand]"]) ?></td>
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
                        ['class' => 'delete-button delete-zaehlerstand btn btn-danger btn-xl']) ?>
                    </td>
                </tr>
            <?php 
            endforeach; 
            ?>
        </table>
        
    </div>
    
    
    <div class="form-group" style="text-align: right;">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
            [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'name' => 'create',
                'value' => 'aa'

            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

