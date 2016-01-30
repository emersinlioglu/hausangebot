<?php 
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;

/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-kaeuferdate" aria-expanded="true" class="">
                    Käuferdaten:
                </a>
            </h4>
        </div>
        <div id="collapse-kaeuferdate" class="panel-collapse collapse in" aria-expanded="false">
            <div class="box-body">
                
                
                <!--<h3>Käuferdaten</h3>-->

		
                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($modelKaeufer, 'debitor_nr')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <?php
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelKaeufer->beurkundung_am);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            echo '<label>Beurkundung am:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Kaeufer[beurkundung_am]",
//                                'options' => ['placeholder' => 'Datum auswählen'],
//                                'convertFormat' => true,
//                                'value' => $datum,
//                                'pluginOptions' => [
//                                    'minView' => 'month',
//                                    'maxView' => 'month',
//                                    'viewSelect' => 'month',
//                                    'format' => 'dd.mm.yyyy',
//                                    'autoclose' => true,
//                                    'todayHighlight' => true
//                                ]
//                            ]);
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
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelKaeufer->verbindliche_fertigstellung);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            echo '<label>verbindliche Fertigstellung:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Kaeufer[verbindliche_fertigstellung]",
//                                'options' => ['placeholder' => 'Datum auswählen'],
//                                'convertFormat' => true,
//                                'value' => $datum,
//                                'pluginOptions' => [
//                                    'minView' => 'month',
//                                    'maxView' => 'month',
//                                    'viewSelect' => 'month',
//                                    'format' => 'dd.mm.yyyy',
//                                    'autoclose' => true,
//                                    'todayHighlight' => true
//                                ]
//                            ]);
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
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelKaeufer->uebergang_bnl);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            echo '<label>Übergang BNL:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Kaeufer[uebergang_bnl]",
//                                'options' => ['placeholder' => 'Datum auswählen'],
//                                'convertFormat' => true,
//                                'value' => $datum,
//                                'pluginOptions' => [
//                                    'minView' => 'month',
//                                    'maxView' => 'month',
//                                    'viewSelect' => 'month',
//                                    'format' => 'dd.mm.yyyy',
//                                    'autoclose' => true,
//                                    'todayHighlight' => true
//                                ]
//                            ]);
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
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelKaeufer->abnahme_se);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            echo '<label>Abnahme SE:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Kaeufer[abnahme_se]",
//                                'options' => ['placeholder' => 'Datum auswählen'],
//                                'convertFormat' => true,
//                                'value' => $datum,
//                                'pluginOptions' => [
//                                    'minView' => 'month',
//                                    'maxView' => 'month',
//                                    'viewSelect' => 'month',
//                                    'format' => 'dd.mm.yyyy',
//                                    'autoclose' => true,
//                                    'todayHighlight' => true
//                                ]
//                            ]);
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
//                            $datum = DateTime::createFromFormat('Y-m-d H:i:s', $modelKaeufer->abnahme_ge);
//                            if ($datum) {
//                                $datum = $datum->format('d.m.Y');
//                            } else {
//                                $datum = '';
//                            }
//                            echo '<label>Abnahme GE:</label>';
//                            echo DateTimePicker::widget([
//                                'name' => "Kaeufer[abnahme_ge]",
//                                'options' => ['placeholder' => 'Datum auswählen'],
//                                'convertFormat' => true,
//                                'value' => $datum,
//                                'pluginOptions' => [
//                                    'minView' => 'month',
//                                    'maxView' => 'month',
//                                    'viewSelect' => 'month',
//                                    'format' => 'dd.mm.yyyy',
//                                    'autoclose' => true,
//                                    'todayHighlight' => true
//                                ]
//                            ]);
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