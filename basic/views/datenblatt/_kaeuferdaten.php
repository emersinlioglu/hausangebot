<?php 
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;
//use kartik\typeahead\TypeaheadBasic;
//use kartik\typeahead\Typeahead;

/* @var $form yii\bootstrap\ActiveForm */
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
//$this->registerJs(
//    '
//    $(function(){
//
//
//    });
//    '
//);
?>

<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#collapse-kaeuferdaten" href="#collapse-kaeuferdaten" aria-expanded="true" class="">
                    Käuferdaten:
                </a>
            </h4>
        </div>
        <div id="collapse-kaeuferdaten" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">

                <!--<h3>Käuferdaten</h3>-->

                <div class="">
                    <?= $form->field($modelDatenblatt, 'kaeufer_id')->textInput() ?>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group field-search-kaufer">
                            <label class="control-label" for="kaeufer-debitor_nr">Suche</label>
                            <input type="text" id="search-kaufer" class="form-control ui-autocomplete-input" name="suche" value="" maxlength="255">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'debitor_nr')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>
                        <?php
//                            echo $form->field($modelKaeufer, 'debitor_nr')->widget(TypeaheadBasic::classname(), [
//                                'data' => ['aaaa' => 'aaaaa', 'b' => 'bbbb'],
//                                'pluginOptions' => ['highlight' => true],
//                                'options' => ['placeholder' => 'Filter as you type ...'],
//                            ]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <?php
                            echo $form->field($modelDatenblatt, "beurkundung_am")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
//                                'disabled' => 'disabled',
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php
                            echo $form->field($modelDatenblatt, "verbindliche_fertigstellung")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
//                                'disabled' => 'disabled',
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                        <?php
                            echo $form->field($modelDatenblatt, "uebergang_bnl")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
//                                'disabled' => 'disabled',
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php
                            echo $form->field($modelDatenblatt, "abnahme_se")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
//                                'disabled' => 'disabled',
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                        <?php
                            echo $form->field($modelDatenblatt, "abnahme_ge")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
//                                'disabled' => 'disabled',
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                    </div>

                    <div class="col-sm-3">
                        <?= $form->field($modelDatenblatt, 'auflassung')->checkbox([
//                            'disabled' => 'disabled'
                        ]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'anrede')->dropDownList([ 0 => 'Herr', 1 => 'Frau'],['prompt' => 'Auswählen', 'disabled' => 'disabled']) ?>
                        <?= $form->field($modelKaeufer, 'anrede2')->dropDownList([ 0 => 'Herr', 1 => 'Frau'],['prompt' => 'Auswählen', 'disabled' => 'disabled']) ?>
                        <?= $form->field($modelKaeufer, 'strasse')->textInput(['disabled' => 'disabled']) ?>
                        <?= $form->field($modelKaeufer, 'email')->textInput(['disabled' => 'disabled']) ?>
                    </div>
                    <div class="col-sm-3">
                         <?= $form->field($modelKaeufer, 'titel')->textInput(['disabled' => 'disabled']) ?>
                         <?= $form->field($modelKaeufer, 'titel2')->textInput(['disabled' => 'disabled']) ?>
                        
                         <?= $form->field($modelKaeufer, 'hausnr')->textInput(['disabled' => 'disabled']) ?>
                         <?= $form->field($modelKaeufer, 'festnetz')
                              //->textInput([])
                              ->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '09999-9[9][9][9][9][9][9][9][9]',
                                  'options' => [
                                      'disabled' => 'disabled',
                                      'class' => 'form-control'
                                  ]
                            ])
                         ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'vorname')->textInput(['disabled' => 'disabled']) ?>
                        <?= $form->field($modelKaeufer, 'vorname2')->textInput(['disabled' => 'disabled']) ?>
                        <?= $form->field($modelKaeufer, 'plz')->textInput(['disabled' => 'disabled']) ?>
                        <?= $form->field($modelKaeufer, 'handy')->textInput(['disabled' => 'disabled']) ?>
                    </div>
                    <div class="col-sm-3">
                         <?= $form->field($modelKaeufer, 'nachname')->textInput(['disabled' => 'disabled']) ?>
                         <?= $form->field($modelKaeufer, 'nachname2')->textInput(['disabled' => 'disabled']) ?>
                         <?= $form->field($modelKaeufer, 'ort')->textInput(['disabled' => 'disabled']) ?>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>