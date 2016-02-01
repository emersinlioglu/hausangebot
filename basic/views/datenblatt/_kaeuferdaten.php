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

                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'debitor_nr')->textInput(['maxlength' => true]) ?>
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
                            echo $form->field($modelKaeufer, "beurkundung_am")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
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
                            echo $form->field($modelKaeufer, "verbindliche_fertigstellung")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                        <?php
                            echo $form->field($modelKaeufer, "uebergang_bnl")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
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
                            echo $form->field($modelKaeufer, "abnahme_se")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                        <?php
                            echo $form->field($modelKaeufer, "abnahme_ge")->widget(DateControl::classname(), [
                                'type' => DateControl::FORMAT_DATE,
                                'options' => [
                                    'pluginOptions' => [
                                        //'autoclose' => true
                                    ]
                                ]
                            ]);
                        ?>
                    </div>

                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'auflassung')->checkbox([]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'anrede')->dropDownList([0 => 'Herr', 1 => 'Frau']) ?>
                        <?= $form->field($modelKaeufer, 'titel')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'vorname')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'nachname')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'email')->textInput([]) ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'anrede2')->dropDownList([0 => 'Herr', 1 => 'Frau']) ?>
                        <?= $form->field($modelKaeufer, 'titel2')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'vorname2')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'nachname2')->textInput([]) ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'strasse')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'hausnr')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'plz')->textInput([]) ?>
                        <?= $form->field($modelKaeufer, 'ort')->textInput([]) ?>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>